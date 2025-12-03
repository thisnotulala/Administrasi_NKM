<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogJadwalProyeksTable extends Migration
{
    public function up()
    {
        Schema::create('log_jadwal_proyeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal_proyeks')->onDelete('cascade');
            $table->date('tanggal_mulai_lama')->nullable();
            $table->date('tanggal_mulai_baru')->nullable();
            $table->date('tanggal_selesai_lama')->nullable();
            $table->date('tanggal_selesai_baru')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_jadwal_proyeks');
    }
}
