<?php

namespace Database\Seeders;

use App\Models\Catalogs\Product;
use App\Models\Transactions\Purchase;
use App\Models\Transactions\PurchaseDetail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('purchases')->insert([
            [
                'supplier_id' => 1,
                'user_id' => 1,
                'purchase_date' => date('Y-m-d'),
                'document_type' => 'Factura',
                'document' => '1231565',
                'status' => 'Active',
                'comments' => 'Lorem laboris id voluptate quis do.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        /* $purchase = Purchase::create([
            'supplier_id' => 1,
            'user_id' => 1,
            'purchase_date' => date('Y-m-d H:i:s'),
            'document_type' => 'Factura',
            'document' => '1231565',
            'status' => 'Active',
            'comments' => 'Lorem laboris id voluptate quis do.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); */

        $purchase = Purchase::first();
        $product = Product::find(1);
        $product2 = Product::find(2);
        $product3 = Product::find(3);

        DB::table('purchase_details')->insert([
            [
                'purchase_id' => $purchase->id,
                'product_id' => $product->id,
                'quantity' => 10,
                'original_cost' => $product->cost,
                'real_cost' => 10.50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'purchase_id' => $purchase->id,
                'product_id' => $product2->id,
                'quantity' => 15,
                'original_cost' => $product2->cost,
                'real_cost' => 10.51,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'purchase_id' => $purchase->id,
                'product_id' => $product3->id,
                'quantity' => 17,
                'original_cost' => $product3->cost,
                'real_cost' => 100.50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        /* $purchaseDetail = PurchaseDetail::create([
            'purchase_id' => $purchase->id,
            'product_id' => $product3->id,
            'quantity' => 17,
            'original_cost' => $product3->cost,
            'real_cost' => 100.50,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $details[] = $purchaseDetail->id;

        $purchase->purchaseDetails()->create( $details ); */
    }
}
