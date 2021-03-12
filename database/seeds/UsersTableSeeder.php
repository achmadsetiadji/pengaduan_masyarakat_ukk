<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //admin
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'telp' => '-',
                'role' => 'admin',
                'image' => '',
                'password' => bcrypt('000000'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //petugas
            [
                'name' => 'petugas',
                'email' => 'petugas@gmail.com',
                'telp' => '-',
                'role' => 'petugas',
                'image' => '',
                'password' => bcrypt('000000'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            //pengguna
            [
                'name' => 'pengguna',
                'email' => 'pengguna@gmail.com',
                'telp' => '082123155292',
                'role' => 'pengguna',
                'image' => '',
                'password' => bcrypt('000000'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        User::insert($data);
    }
}
