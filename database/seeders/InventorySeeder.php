<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
        	[
	        	'name' => 'Computadora de escritorio',
	        	'description' => 'Color negro, marca PHP',
	        	'peopleCharge' => 'David Dzul',
                'created_at' => date('Y-d-m H:i:s'),
                'update_at' => date('Y-d-m H:i:s'),
        	],
            [
	        	'name' => 'Laptop',
	        	'description' => 'Gris Lenovo',
	        	'peopleCharge' => 'David Dzul',
        	],
            [
	        	'name' => 'Monitor',
	        	'description' => 'PHP',
	        	'peopleCharge' => 'David Dzul',
        	],
        ]);
    }
}