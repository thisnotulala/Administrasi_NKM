<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id')->constrained('proyeks')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('tipe')->nullable();
            $table->bigInteger('jumlah')->unsigned()->default(0);
            $table->text('keterangan')->nullable();
            $table->foreignId('dibuat_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluarans');
    }
}
