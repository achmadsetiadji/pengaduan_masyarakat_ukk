<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $lokasi = 'database/seeds/assets/lokasis.sql';
        DB::unprepared(file_get_contents($lokasi));
    }
}
