<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('container_id')->constrained();
            $table->date('purchase_date', 0)->nullable();
            $table->date('date_attempt', 0)->nullable();
            $table->date('date_arrival', 0)->nullable();
            $table->string('place_arrival', 250)->nullable()->default(null);
            $table->enum('document_type', ['Boleta', 'Factura'])->default('Boleta');
            $table->string('document', 50)->nullable();
            $table->string('comments')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
