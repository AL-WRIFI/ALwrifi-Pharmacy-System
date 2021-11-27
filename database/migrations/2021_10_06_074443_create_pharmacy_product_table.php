<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharmacy_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('price')->default(0.0);
            $table->unsignedInteger('quantity')->default(0);
            $table->timestamps();

            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop foreign keys first
        Schema::table('pharmacy_product', function(Blueprint $table) {
            $table->dropForeign('pharmacy_id');
            $table->dropForeign('products_id');
        });

        Schema::dropIfExists('pharmacy_product');
    }
}
