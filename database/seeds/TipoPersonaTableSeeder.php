<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TipopersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('tipo_persona')->delete();

        \DB::table('tipo_persona')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'nombre' => 'expo'
                ),
            1 =>
                array (
                    'id' => 2,
                    'nombre' => 'consecionario',
                ),
            2 =>
                array (
                    'id' => 3,
                    'nombre' => 'mayorista'
                ),
            3 =>
                array (
                    'id' => 4,
                    'nombre' => 'minorista',
                ),
            4 =>
                array (
                    'id' => 5,
                    'nombre' => 'taller',
                )
            )
        );
    }
}
