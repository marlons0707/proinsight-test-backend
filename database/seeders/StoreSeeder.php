<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'name' => 'Distribuidora ferretera del sur',
                'address' => '5calle 3-38 zona 2 Plaza magnolias Boca del Monte Villa Canales',
                'phone' => '52071-6965',
                'email' => 'ddelsur14@gmail.com',
                'description' => 'Sucursal principal',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ferresur',
                'address' => '4 av 3-55 zona 1 Boca del Montev Villa Canales',
                'phone' => null,
                'email' => 'derresurbdm@gmail.com',
                'description' => 'Sucursal de materiales',
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
