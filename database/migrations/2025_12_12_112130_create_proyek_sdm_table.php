<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekSdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('proyek_sdm', function (Blueprint $table) {
        $table->id();
        $table->foreignId('proyek_id')->constrained()->cascadeOnDelete();
        $table->foreignId('sdm_id')->constrained()->cascadeOnDelete();
        $table->string('peran')->nullable();
        $table->date('tanggal_mulai')->nullable();
        $table->date('tanggal_selesai')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek_sdm');
    }
}
