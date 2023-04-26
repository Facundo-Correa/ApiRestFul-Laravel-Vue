<?php

namespace App\Console\Commands;

use App\Http\Controllers\FirebaseNotificationController;
use App\Notificacion\FBNotificacion;
use App\NotificationQueue;
use Illuminate\Console\Command;

class SendFBNot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:FBNot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '|| Testeo para las notificaciones en cola : LMartz ||';

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
        // || Modo test
        // || FirebaseNotificationController::send_fcm(true);

        // || Modo produccion
        FirebaseNotificationController::send_fcm(false);
    }


}
