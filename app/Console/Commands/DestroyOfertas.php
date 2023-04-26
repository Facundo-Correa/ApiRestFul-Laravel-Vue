<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use App\Basket;
use App\Producto;
use App\V2PromoVista;
use Illuminate\Console\Command;

class DestroyOfertas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'destroy:ofertas';

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
    public static function handle()
    {
        $hoy = Carbon::today();//fecha de hoy
        $vista = V2PromoVista::getOfertasAll()->get();
        
        if($vista){
            foreach($vista as $item){
                if(($item->desde < $hoy->format('Y-m-d')) && ($item->hasta < $hoy->format('Y-m-d'))){
                    $basket = Basket::query()->where('combo_id','=',$item->id)->get();
                    if($basket)
                    {
                        foreach ($basket as $item2) {
                            $productos = Producto::findOrFail($item->producto);
                            Basket::create(
                                [
                                    'producto_id' => $item->producto,
                                    'quantity' => $item2->quantity,
                                    'cliente_id' => $item2->cliente_id,
                                    'price' => $productos->precio_actual,
                                ]
                            );
                            //borro el item
                            $item2->delete();
                        }
                    }
                }
            }
        }
    }   
};
