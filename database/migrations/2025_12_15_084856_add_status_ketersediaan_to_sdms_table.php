<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusKetersediaanToSdmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('sdms', function (Blueprint $table) {
        $table->enum('status_ketersediaan', ['tersedia', 'ditugaskan'])
              ->default('tersedia')
              ->after('jabatan');
    });
}

public function down()
{
    Schema::table('sdms', function (Blueprint $table) {
        $table->dropColumn('status_ketersediaan');
    });
}
}