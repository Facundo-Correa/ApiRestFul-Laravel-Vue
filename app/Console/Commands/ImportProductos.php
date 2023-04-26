<?php

namespace App\Console\Commands;

use App\Http\Controllers\AlertaProductoUsuarioController;
use App\Http\Controllers\ImportController;
use Illuminate\Console\Command;

class ImportProductos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:Productos';

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
        $import = New ImportController();
        $res_import = $import->store();

        if($res_import == 'ok')
        {
            $alerta = new AlertaProductoUsuarioController();
            $alerta->checkProducts();

        }

    }
}
