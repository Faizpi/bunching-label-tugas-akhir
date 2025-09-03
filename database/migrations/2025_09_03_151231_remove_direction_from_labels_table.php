<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDirectionFromLabelsTable extends Migration
{
    public function up()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->dropColumn('direction');
        });
    }

    public function down()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->char('direction', 5)->default('S');
        });
    }
}
