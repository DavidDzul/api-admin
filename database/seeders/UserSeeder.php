<?php

namespace Database\Seeders;

use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "firstName" => "Admin",
            "lastName" => "",
            "email" => "admin@iu.org.mx",
            "password" => Hash::make("abc123"),
            "phone" => "+529911071509",
            "workPosition" => "Encargado de activos",
            "campus" => "MERIDA",
            "admin" => 1,
            "active" => 1,
        ]);
    }
}
