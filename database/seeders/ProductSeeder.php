<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Martillo',
                'description' => 'Martillo de mano pequeño',
                'stock' => 10,
                'price' => 20.5,
                'cost' => 15.5,
                'image' => 'fotos/product_name',
                'category_id' => 1,
                'unit_id' => 1,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Casco',
                'description' => 'Casco protector',
                'stock' => 100,
                'price' => 10.5,
                'cost' => 5.5,
                'image' => 'fotos/product_name',
                'category_id' => 2,
                'unit_id' => 2,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Alicate',
                'description' => null,
                'stock' => 50,
                'price' => 30.5,
                'cost' => 15.5,
                'image' => 'fotos/product_name',
                'category_id' => 3,
                'unit_id' => 6,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lámina',
                'description' => 'Lámina gris',
                'stock' => 6,
                'price' => 100.5,
                'cost' => 80.5,
                'image' => 'fotos/product_name',
                'category_id' => 4,
                'unit_id' => 5,
                'status' => 'Y',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
