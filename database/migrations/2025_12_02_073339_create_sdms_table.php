<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdmsTable extends Migration
{
    public function up()
    {
        Schema::create('sdms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('kontak')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sdms');
    }
}
