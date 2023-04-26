<?php

namespace App\Http\Controllers;

use App\Exports\ExportListas;
use App\Mail\TextMail;
use App\Marcas;
use App\Modelos;
use App\Origen;
use App\Partes;
use App\Producto;
use App\Proveedores;
use Box\Spout\Reader\Common\Creator\ReaderFactory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{
    /**
     * @var array
     */
    private $proveedores;
    private $marcas;
    private $modelos;
    private $partes;
    private $origenes;
    private $hoy ;
    private $productos;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool|\Illuminate\Http\Response
     */
    public function store()
    {
        //Importamos Proveedores
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', -1);
        $this->hoy = Carbon::now();
        Log::channel('sync')->info('____________________________________________________________________');
        Log::channel('sync')->info(date('Ymd H:i:s')." - Inicio de importarcion de productos.");

        $filePath=base_path('public/storage/listadoPagina.xlsx');
        $filePath_old=base_path('public/storage/listadoPagina.xl__');

        if(!file_exists($filePath))
        {
            Log::channel('sync')->info(date('Ymd H:i:s')." - No hay archivo para procesar, fin del cron");
            Log::channel('sync')->info('____________________________________________________________________');

            return  "No hay archivo para procesar, fin del cron";
        }
        //Renombrar archivo sync.log a sync_ant.log
        //Eliminar Log::info menos el del catch, que no está (agregarlo en el catch) - done -
        //Ver por qué da error el rename()

        try {

            $reader = ReaderFactory::createFromFile($filePath); // for XLSX
            $reader->setShouldFormatDates(false);
            $reader->open($filePath);

            if(!$reader)
                throw new \Exception("El archivo no es legible por el importador");

            DB::beginTransaction();
            DB::statement('SET foreign_key_checks = 0;');
            // Log::info('____________________________________________________________________');
            DB::table('productos')->truncate();

            // Log::info(date('Ymd H:i:s').'-Borramos productos');
            Log::channel('sync')->info(date('Ymd H:i:s')." -Borramos productos.");

             //$products = Excel::toArray(new ProveedoresImport, 'listadoPagina.xlsx','local',\Maatwebsite\Excel\Excel::XLSX);
            // $products =  (new FastExcel)->configureReaderUsing('setExcludeRows',2;)->import( base_path('public/storage/listadoPagina.xlsx'));



            $arrExcluir =array(999999,888888,99901);

            $prov = [];
            $partes=[];
            $marca =[];
            $modelo=[];
            $origen=[];
            $prod =[];
            $fil_csv=[];

            //fix para reducir la coleccion
            foreach ($reader->getSheetIterator() as $sheet) {
                $i = (int)0;
                $rows_count = (int)0;
                foreach ($sheet->getRowIterator() as $row=>$value) {
                    $i++;

                    if($i < 4)
                        continue;

                    $cell = $value->getCells();


                    if (in_array($row, $arrExcluir))
                        continue;

                    $prov[]   = [$cell[9]->getValue(), $cell[10]->getValue()];

                    if (trim($cell[11]->getValue()) == "NA" || trim($cell[11]->getValue()) == "NC")
                        continue;

                    $partes[] = [$cell[11]->getValue(), $cell[12]->getValue()];
                    $marca[]  = [$cell[13]->getValue(), $cell[14]->getValue()];
                    $modelo[] = [$cell[15]->getValue(), $cell[13], $cell[16]->getValue()];
                    $origen[] = [$cell[17]->getValue(), $cell[18]->getValue()];

                    try {
                        DB::statement('SET foreign_key_checks = 0;');

                        //obtenemos provedores
                        //$ori = $productos->unique('origen');
                        //dd($cell[2]->getValue()->format('Y-m-d'));
                        //
                        //dd($cell[2]);
                        $productos = Producto::create([
                            'id' => $cell[0]->getValue(),
                            'proveedor_id' => $cell[9]->getValue(),
                            'parte_id' => $cell[11]->getValue(),
                            'marca_id' => $cell[13]->getValue(),
                            'modelo_id' => $cell[15]->getValue(),
                            'origen_id' => $cell[17]->getValue(),
                            'estado_id' => $cell[22]->getValue(),
                            'nombre' => $cell[1]->getValue(),
                            'um' => $cell[5]->getValue(),
                            'umq' => $cell[6]->getValue(),
                            'vigencia_desde' => $cell[2]->getValue()->format('Y-m-d'),
                            'fecha_activo' => $cell[3]->getValue()->format('Y-m-d'),
                            'precio_actual' => $cell[7]->getValue(),
                            'dolar' => $cell[8]->getValue(),
                            'destacado' => '',
                            'stock' => $cell[20]->getValue(),
                            'descripcion' => $cell[23]->getValue()
                        ]);

                        $articulo = $cell[0]->getValue();
                        $nombrecsv = $cell[1]->getValue();
                        $um = $cell[5]->getValue();
                        (int)$umq = $cell[6]->getValue();
                        $vigencia_desde = $cell[2]->getValue()->format('Y-m-d');
                        (float)$precio_actual = $cell[7]->getValue();
                        (float)$moneda = $cell[8]->getValue();
                        $origen_desc = $cell[17]->getValue();
                        $descripcion = $cell[23]->getValue();;

                        $fil_csv[] = array("$articulo", "$nombrecsv", "$um", (int)"$umq", "$vigencia_desde", (float)"$precio_actual", (float)"$moneda", "$origen_desc", "$descripcion");

                        // Log::info("Registro Nº: {$i} | Producto: {$articulo}");
                        Log::channel('sync')->info("Registro Nº: {$i} | Producto: {$articulo}");




                        if ($rows_count == 500) {
                            // Log::info("comit de los primeros 500");
                            Log::channel('sync')->info("comit de los primeros 500");
                            DB::commit();
                            $rows_count = 0;
                        }

                        $rows_count++;

                        DB::statement('SET foreign_key_checks = 1;');
                    } catch (\Exception $e) {

                        //DB::rollback();
                        // Log::info("Error al momento de procesar el registro {$i}\n");
                        // Log::info("mensage de salida {$e} ");
                        Log::channel('sync')->error("Error al momento de procesar el registro {$i}\n");
                        Log::channel('sync')->error("mensage de salida {$e} ");
                    }
                }
            }

            // Log::info("Total de registros procesacos: {$i} | Ultimo Producto Ingresao: {$articulo}");
            Log::channel('sync')->info("Total de registros procesacos: {$i} | Ultimo Producto Ingresao: {$articulo}");

            $this->insertProveedores(collect($prov));

            //Importamos Marcas
            $this->insertMarcas(collect($marca));
            //Importamos Modelos
            $this->insertModelos(collect($modelo));
            //Importamos Partes
            $this->insertPartes(collect($partes));
            //Importamos Origenes
            $this->insertOrigenes(collect($origen));

            //genero xls de descarga
            //dd(base_path('public/storage/ListadoCompleto.xlsx'));
            $res =  Excel::store(new ExportListas($fil_csv), 'ListadoCompleto.xlsx', 'public', \Maatwebsite\Excel\Excel::XLSX);

            if (!$res) {
                // enviar mail de error en generacion de xlsx
                throw new \Exception('no se pudo generar listado completo');
            }

            if((!file_exists($filePath_old)) || is_writable($filePath_old)){
                //cambiamos nombre de archivo para no reprocesar cada hora
                copy($filePath, $filePath_old);
            }
            else{
                throw new \Exception('no se pudo cambiar el nombre');
            }
            Log::channel('sync')->info(date('Ymd H:i:s') . " - fin de la importación con éxito");
            Log::channel('sync')->info('____________________________________________________________________');

            return "ok";
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            Log::channel('sync')->error('____________________________________________________________________');
            Log::channel('sync')->error(date('Ymd H:i:s') . " - fin de la importación con érror: {$e->getMessage()}");
            Log::channel('sync')->error('____________________________________________________________________');
            Mail::to(env('VENTAS_RECIPIENT'))->send(new TextMail("Error en Importación ", $e->getMessage()));
            Mail::to(env('ADMIN_RECIPIENT'))->send(new TextMail("Error en Importación ", $e->getMessage()));
            

            return $e->getMessage();
        }
    }

    private function insertProveedores($productos,  $proveedores = [])
    {
        try {
            // Log::info("-------------------------------------------------------------");
            Log::channel('sync')->info("-------------------------------------------------------------");

            // Log::info("Insertamos Proveedores");
            Log::channel('sync')->info("Insertamos Proveedores");
            DB::beginTransaction();
            DB::statement('SET foreign_key_checks = 0;');
            DB::table('proveedores')->truncate();
            

            //obtenemos provedores
            $prov = $productos->unique(0);

            $prov->each(function ($item, $key) {

                $this->proveedores[] =  [
                    'id' => $item[0],
                    'proveedor' => $item[1],
                    'created_at' => $this->hoy
                ];
            });

            //dd($this->proveedores);
            Proveedores::insert($this->proveedores);
            DB::commit();
            DB::statement('SET foreign_key_checks = 1;');
        } catch (\Exception $e) {

            DB::rollback();
            Log::error("No se pudieron insertar Proveedores error: {$e}");
            Log::channel('sync')->error("No se pudieron insertar Proveedores error: {$e}");
        }
    }

    private function insertMarcas($productos,  $marcas = [])
    {
        try {
            // Log::info("-------------------------------------------------------------");
            Log::channel('sync')->info("-------------------------------------------------------------");

            // Log::info("Insertamos Marcas");
            Log::channel('sync')->info("Insertamos Marcas");

            DB::statement('SET foreign_key_checks = 0;');
            DB::table('marcas')->truncate();
            DB::beginTransaction();

            //obtenemos provedores
            $marc = $productos->unique(0);
            //dd($marc);
            $marc->each(function ($item, $key) {

                $this->marcas[] =  [
                    'id' => $item[0],
                    'marca' => $item[1],
                    'created_at' => $this->hoy
                ];
            });

            Marcas::insert($this->marcas);
            DB::commit();
            DB::statement('SET foreign_key_checks = 1;');
        } catch (\Exception $e) {

            DB::rollback();
            Log::error("No se pudieron insertar Marcas error: {$e}");
            Log::channel('sync')->error("No se pudieron insertar Marcas error: {$e}");
        }
    }


    private function insertModelos($productos,  $modelos = [])
    {
        try {
            // Log::info("-------------------------------------------------------------");
            Log::channel('sync')->info("-------------------------------------------------------------");

            // Log::info("Insertamos Modelos");
            Log::channel('sync')->info("Insertamos Modelos");

            DB::statement('SET foreign_key_checks = 0;');
            DB::table('modelos')->truncate();
            DB::beginTransaction();

            //obtenemos provedores
            $mod = $productos->unique(0);
            //dd($mod);
            $mod->each(function ($item, $key) {

                $this->modelos[] =  [
                    'id' => $item[0],
                    'modelo' => $item[2],
                    'marca_id' => $item[1],
                    'created_at' => $this->hoy
                ];
            });

            //dd($this->proveedores);
            Modelos::insert($this->modelos);
            DB::commit();
            DB::statement('SET foreign_key_checks = 1;');
        } catch (\Exception $e) {

            DB::rollback();
            Log::error("No se pudieron insertar Modelos error: {$e}");
            Log::channel('sync')->error("No se pudieron insertar Modelos error: {$e}");
        }
    }


    private function insertPartes($productos,  $partes = [])
    {
        try {

            // Log::info("-------------------------------------------------------------");
            Log::channel('sync')->info("-------------------------------------------------------------");

            // Log::info("Insertamos Partes");
            Log::channel('sync')->info("Insertamos Partes");

            DB::statement('SET foreign_key_checks = 0;');
            DB::table('partes')->truncate();
            DB::beginTransaction();

            //obtenemos provedores
            $part = $productos->unique(0);

            $part->each(function ($item, $key) {


                $this->partes[] = [
                    'id' => $item[0],
                    'parte' => $item[1],
                    'created_at' => $this->hoy
                ];
            });

            //dd($this->proveedores);
            Partes::insert($this->partes);
            DB::commit();
            DB::statement('SET foreign_key_checks = 1;');
        } catch (\Exception $e) {

            DB::rollback();
            Log::error("No se pudieron insertar Partes error: {$e}");
            Log::channel('sync')->error("No se pudieron insertar Partes error: {$e}");
        }
    }


    private function insertOrigenes($productos,  $origenes = [])
    {
        try {

            // Log::info("-------------------------------------------------------------");
            Log::channel('sync')->info("-------------------------------------------------------------");

            // Log::info("Insertamos Origenes");
            Log::channel('sync')->info("Insertamos Origenes");

            DB::statement('SET foreign_key_checks = 0;');
            DB::table('origen')->truncate();
            DB::beginTransaction();

            //obtenemos provedores
            $ori = $productos->unique(0);
            //dd($prov);
            $ori->each(function ($item, $key) {

                $this->origenes[] =  [
                    'id' => $item[0],
                    'origen' => $item[1],
                    'created_at' => $this->hoy

                ];
            });

            //dd($this->proveedores);
            Origen::insert($this->origenes);
            DB::commit();
            DB::statement('SET foreign_key_checks = 1;');
        } catch (\Exception $e) {

            DB::rollback();

            Log::error("No se pudieron insertar Origenes error: {$e}");
            Log::channel('sync')->error("No se pudieron insertar Origenes error: {$e}");
        }
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
