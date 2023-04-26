<?php

namespace App\Console\Commands;

use App\Domicilios;
use App\Geolocalizacion;
use App\Personas;
use App\TipoPersona;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:Usuarios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        try {
            $startTime = microtime(true);

            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');
            $this->info(date('Ymd H:i:s') . ' - Obtenemos Usuarios y propagamos datos.');
            Log::channel('sync')->info(date('Ymd H:i:s') . ' - Obtenemos Usuarios y propagamos datos.');

            DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
            DB::select(DB::raw('TRUNCATE personas'));
            DB::select(DB::raw('TRUNCATE domicilios'));
            DB::select(DB::raw('TRUNCATE users'));


            //registros de mails duplicados con ventas

            //elimino duplicados de origen
            DB::select(DB::raw('DELETE FROM ' . env("DB2_DATABASE") . '.usuarios WHERE id IN (SELECT * 
                 FROM (SELECT id FROM ' . env("DB2_DATABASE") . '.usuarios WHERE n_plataforma =0
                       GROUP BY email HAVING (COUNT(*) > 1)
                      ) AS A
                                        );'));


            $usuarios = DB::select(DB::raw('SELECT DISTINCT(email), usuarios.* from  ' . env("DB2_DATABASE") . '.`usuarios` where n_plataforma > 0 and terminos = \'aceptados\';'));

            foreach ($usuarios as $user) {

                $tipo_persona_id = TipoPersona::where('nombre', $user->perfil_de_cliente)->first();
                $tipoper = is_object($tipo_persona_id) ? $tipo_persona_id->id : 4;

                //insertar datos en personas
                $persona = Personas::create(
                    [
                        'nombre' => $user->nombre,
                        'apellido' => $user->apellido,
                        'empresa' => $user->nombre,
                        'telefono' => $user->empresa,
                        'cuit' => $user->cuit,
                        'phone' => $user->celular,
                        'telefno' => $user->telefono,
                        'n_plataforma' => $user->n_plataforma,
                        'terminos' => ($user->terminos === 'aceptados') ? true : false,
                        'newsletter_mail' => $user->recibe_ofernews ? true : false,
                        'ofertas_mail' => $user->recibe_ofernews ? true : false,
                        'nacimiento' => $user->nacimiento,
                        'descuento_comercial' => $user->descuento_comercial,
                        'tipo_persona_id' => $tipoper,
                        'status_id' => ($user->id_cliente == 4) ? 4 : 1
                    ]
                );
                $persona->save();

                //insertar Domicilio

                $provincia_bsas = [
                    'Ciudad Autonoma' => ['CABA', 'C.A.B.A', 'capital', 'ciudad autonoma de buenos aires', 'ciudad de buenos aires'],
                    'Buenos Aires' => ['bs as', 'bs.as.', 'baires', 'b.a b.s', 'ba sa',]
                ];


                $geloc = '';
                $prov_bs = array_search($user->provincia, $provincia_bsas['Buenos Aires']);
                $prov_caba = array_search($user->provincia, $provincia_bsas['Ciudad Autonoma']);

                $prov = (($prov_caba != false) ? 'Ciudad Autonoma' : ($prov_bs != false)) ? 'Buenos Aires' : false;


                //Busco por pais
                if ($user->pais) {
                    $geloc = Geolocalizacion::where('nombre', $user->pais)->first();
                } else {
                    $geloc = 1;
                }

                if ($prov != false)
                    $geloc = Geolocalizacion::where('nombre', $prov)->where('parent_id', $geloc)->first();
                else
                    $geloc = 3;

                $localidad = Geolocalizacion::where('nombre', $user->localidad)->where('parent_id', $geloc)->first();


                $loc = (!is_null($localidad)) ? $localidad->id : 2;
                $domicilio = Domicilios::create([
                    'id' => $user->id,
                    'direccion' => $user->direccion,
                    'nombre' => $user->empresa,
                    'geolocalizacion_idÍndice' => $loc,
                    'persona_id' => $persona->id
                ]);
                $domicilio->save();

                //Insertar datos en user
                $usuario = User::create([
                    'id' => $user->id,
                    'name' => $user->usr,
                    'email' => $user->email,
                    'password' => $user->pass,
                    'persona_id' => $persona->id,
                    'activado' => ($user->habilitado == 'si') ? 1 : 0,
                    'role' => $user->permisos
                ]);

                $usuario->save();

            }


            $timeElapsed = microtime(true) - $startTime;
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Activamos la revisión de claves foráneas
            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');
            $this->info('Script finalizado');
            Log::channel('sync')->info('Script finalizado');
            $this->info('Tiempo de ejecución: ' . $timeElapsed . ' segundos...');
            Log::channel('sync')->info('Tiempo de ejecución: ' . $timeElapsed . ' segundos...');
            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');

            DB::commit();
            return "fin importación usuarios";

        }catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();

        }

    }
}
