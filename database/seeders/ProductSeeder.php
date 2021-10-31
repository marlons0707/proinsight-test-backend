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
                'sku' => '00001112345',
                'volume' => '15 X 10 X 40',
                'units_per_box' => '25',
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
                'sku' => '00001112346',
                'volume' => '15 X 10 X 40',
                'units_per_box' => '15',
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
                'sku' => '00001112347',
                'volume' => '15 X 10 X 40',
                'units_per_box' => '35',
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
                'sku' => '00001112348',
                'volume' => '15 X 10 X 40',
                'units_per_box' => '45',
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
