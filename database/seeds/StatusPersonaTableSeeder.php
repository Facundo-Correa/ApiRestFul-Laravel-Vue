<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StatusPersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('statuses')->delete();

        \DB::table('statuses')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'nombre' => 'habilitado'
                ),
            1 =>
                array (
                    'id' => 2,
                    'nombre' => 'inhabilitado',
                ),
            2 =>
                array (
                    'id' => 4,
                    'nombre' => 'moroso'
                )
            )
        );
    }
}
