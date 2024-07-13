<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilePathToDataUploadsTable extends Migration
{
    public function up()
    {
        Schema::table('data_uploads', function (Blueprint $table) {
            $table->string('file_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('data_uploads', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }
}
