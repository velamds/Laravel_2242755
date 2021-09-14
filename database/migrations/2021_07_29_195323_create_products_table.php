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
            $table->id(); //PK, Autoincrement, id
            $table->string('name',50);
            $table->double('cost',10,2);
            $table->double('price',10,2);
            $table->integer('quantity');
            $table->foreignId('brand_id');//unsigned Int
            $table->timestamps(); // created_at //updated_at

            $table->foreign('brand_id')->references('id')->on('brands');
            //Constraint
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
