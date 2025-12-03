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
            $table->string('pemilik_proyek')->nullable();
            $table->string('lokasi')->nullable();

            $table->bigInteger('nilai_kontrak')->nullable(); // pakai bigint

            $table->date('rencana_mulai')->nullable();
            $table->date('rencana_selesai')->nullable();

            $table->enum('status', ['berjalan','selesai','tertunda'])->default('berjalan');

            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyeks');
    }
}
