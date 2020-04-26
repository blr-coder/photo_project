<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->date('date')->nullable();

            $table->string('desktop_image');
            $table->string('mobile_image');

            $table->string('photographer')->nullable();
            $table->string('location')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
