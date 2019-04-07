<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportsTable extends Migration
{
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->uuid('user_id');
            $table->boolean('processed')
                ->nullable();
            $table->dateTime('processed_date')
                ->nullable();
            $table->timestamps();
        });

        Schema::table('imports', function($table) {
            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imports');
    }
}
