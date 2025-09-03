<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeSizeToLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
{
    Schema::table('labels', function (Blueprint $table) {
        $table->string('type_size')->nullable();
    });
}

public function down()
{
    Schema::table('labels', function (Blueprint $table) {
        $table->dropColumn('type_size');
    });
}

}
