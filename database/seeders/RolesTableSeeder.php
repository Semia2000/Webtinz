<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('roles')->insert([
            ['name' => 'user'],
            ['name' => 'master_admin'],
            ['name' => 'admin_user'],
            ['name' => 'sale_manager'],
            ['name' => 'technical_manager'],
        ]);
    }
}
