<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->integer('extra_weight')->nullable();
            $table->integer('extra_length')->nullable();
        });
    }

    public function down()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->dropColumn(['extra_weight', 'extra_length']);
        });
    }

}
