<?php

namespace App\Console\Commands;

use App\Notificacion\FBNotificacion;
use Illuminate\Console\Command;

class TestFirebase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:Firebase {user_id*} {--token=*}';

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
       $res = FBNotificacion::sendFM($this->argument('user_id'),$this->option('token'),'Prueba notificacion','Este es un mensaje de prueba Perdon y Gracias');
        dd($res);
    }
}
