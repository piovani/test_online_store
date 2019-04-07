<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('name');
            $table->string('sub_name');
            $table->float('price');

            $table->string('image1')
                ->nullable();

            $table->string('image2')
                ->nullable();

            $table->string('image3')
                ->nullable();

            $table->string('image4')
                ->nullable();

            $table->uuid('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->text('description');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
