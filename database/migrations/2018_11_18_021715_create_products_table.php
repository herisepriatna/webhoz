<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
          $table->increments('id');//jika primary key nya diganti maka di model harus di define ulang protected $table='nama_actual'
          $table->integer('category_id');
          $table->string('name');
          $table->string('slug');
          $table->string('description');
          $table->integer('stock');
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
