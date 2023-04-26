<?php

namespace App\Console\Commands;

use App\Domicilios;
use App\Geolocalizacion;
use App\Mail\TextMail;
use App\Mail\UpdateMovimientosError;
use App\Personas;
use App\TipoPersona;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SyncMasterDB extends Command
{

    /**
     * Borrar en produccion
     * DELETE FROM `usuarios` WHERE `usuarios`.`id` = 892;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 1521;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 1493;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 2237;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 1208;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 1435;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 155;
    DELETE FROM `usuarios` WHERE `usuarios`.`id` = 4828;
     *
     *
     */
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:masterdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronizar base de datos antigua con la nueva';

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
        $startTime = microtime(true);

        //
	$db = env("DB_DATABASE");

        $synctables = [
            'mailing' => 'mailing',
            'newsletters' => 'newsletters',
            'image' => 'image',
            'ofertas' => 'ofertas',
            'oferta_productos' => 'oferta_productos',
            'v2_promos' => 'v2_promos',
            'v2_promo_dia' => 'v2_promo_dia',
            'v2_promo_marca' => 'v2_promo_marca',
            'v2_promo_mes' => 'v2_promo_mes',
            'v2_promo_modelo' => 'v2_promo_modelo',
            'v2_promo_origen' => 'v2_promo_origen',
            'v2_promo_parte' => 'v2_promo_parte',
            'v2_promo_producto' => 'v2_promo_producto',
            'v2_promo_producto_regalo' => 'v2_promo_producto_regalo',
            'v2_promo_semana' => 'v2_promo_semana',
            'v2_promo_tipo_usuario' => 'v2_promo_tipo_usuario',
            'v2_tipo_criterio' => 'v2_tipo_criterio',
            'v2_tipo_entidad' => 'v2_tipo_entidad',
            'v2_tipo_promocion' => 'v2_tipo_promocion'
        ];

        $sync_tables_custom = [
            'mailing_users' => 'mailing_user',
            'newsletters' => 'newsletters',

        ];

        try {




            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');
            $this->info(date('Ymd H:i:s').' - Inicio de actualización.');
            Log::channel('sync')->info(date('Ymd H:i:s').' - Inicio de actualización.');
            $startTime = microtime(true);

            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');
            $this->info(date('Ymd H:i:s').' - Obtenemos Ultimos registros importados.');
            Log::channel('sync')->info(date('Ymd H:i:s').' - Obtenemos Ultimos registros importados.');

            DB::beginTransaction();

            DB::select( DB::raw('SET FOREIGN_KEY_CHECKS=0;'));

            foreach ($synctables as $key=>$value)
            {

                $this->info('____________________________________________________________________');
                Log::channel('sync')->info('____________________________________________________________________');
                $this->info(date('Ymd H:i:s')." - Obtenemos Ultimos registros {$key}.");
                Log::channel('sync')->info(date('Ymd H:i:s')." - Obtenemos Ultimos registros {$key}.");

                DB::select( DB::raw("TRUNCATE {$db}.{$key}"));
                DB::select( DB::raw('INSERT INTO '.env("DB_DATABASE").'.'.$key .' SELECT * from  '.env("DB2_DATABASE").'.'.$value.';'));

            }



            $timeElapsed = microtime(true) - $startTime;
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Activamos la revisión de claves foráneas
            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');
            $this->info('Script finalizado');
            Log::channel('sync')->info('Script finalizado');
            $this->info('Tiempo de ejecución: '.$timeElapsed.' segundos...');
            Log::channel('sync')->info('Tiempo de ejecución: '.$timeElapsed.' segundos...');
            $this->info('____________________________________________________________________');
            Log::channel('sync')->info('____________________________________________________________________');

            DB::commit();
        }catch(\Exception $e) {
            DB::rollBack();
            Mail::to(env('ADMIN_RECIPIENT'))->send(new TextMail('Fallo Sincronización',$e));
        }

    }

}
