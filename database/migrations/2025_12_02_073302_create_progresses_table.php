<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressesTable extends Migration
{
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id')->constrained('proyeks')->onDelete('cascade');
            $table->integer('persentase')->unsigned()->default(0);
            $table->text('keterangan')->nullable();
            $table->enum('status_validasi', ['pending','valid','revisi'])->default('pending');
            $table->foreignId('dibuat_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('progresses');
    }
}
