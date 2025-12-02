<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('nama_equipment');
            $table->string('kondisi')->nullable();
            $table->integer('jumlah')->unsigned()->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
