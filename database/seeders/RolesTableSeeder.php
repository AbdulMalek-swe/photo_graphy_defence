<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin area
        DB::table('roles')->insert([
            "name" => 'admin'
        ]);

        //user area
        DB::table('roles')->insert([
            "name" => 'user'
        ]);
    }
}
