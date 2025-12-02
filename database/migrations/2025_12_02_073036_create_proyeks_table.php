<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['berjalan','selesai'])->default('berjalan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyeks');
    }
}
