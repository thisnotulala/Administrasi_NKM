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
            $table->unsignedBigInteger('client_id')->nullable(); // relasi baru
            $table->string('lokasi')->nullable();
            $table->bigInteger('nilai_kontrak')->nullable();
            $table->date('rencana_mulai')->nullable();
            $table->date('rencana_selesai')->nullable();
            $table->enum('status', ['berjalan','selesai','tertunda'])->default('berjalan');
            $table->text('deskripsi')->nullable();

            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyeks');
    }
}
