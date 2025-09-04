<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLengthToVarcharOnLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('labels', function (Blueprint $table) {
        $table->string('length', 50)->change();
    });
}

public function down()
{
    Schema::table('labels', function (Blueprint $table) {
        $table->integer('length')->change();
    });
}
}
