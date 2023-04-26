<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GeolocalizacionTableSeeder::class);
        $this->call(StatusPersonaTableSeeder::class);
        $this->call(TipopersonaTableSeeder::class);
    }
}
