<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlasanToProgressTable extends Migration
{
    public function up()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->string('status_validasi')->default('tidak valid'); 
            $table->text('alasan')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->dropColumn(['status_validasi', 'alasan']);
        });
    }
}
