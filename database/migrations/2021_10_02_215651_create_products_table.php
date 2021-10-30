<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();

            $table->foreignId('category_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->foreignId('unit_id')->constrained();

            $table->string('description')->nullable();
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->decimal('cost', 10, 2);
            $table->string('image')->nullable();
            $table->enum('status', ['Y', 'N'])->default('Y');
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
        Schema::dropIfExists('products');
    }
}
