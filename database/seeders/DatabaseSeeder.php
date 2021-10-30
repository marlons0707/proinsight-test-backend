<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ProductSeeder::class);

        $this->call(PurchaseSeeder::class);
    }
}
