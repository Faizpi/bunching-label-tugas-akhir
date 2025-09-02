<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMachineNoColumnToIncrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('increments', function (Blueprint $table) {
            $table->integer('machine_number')->nullable()->default(0)->after("last_number");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('increments', function (Blueprint $table) {
            $table->dropColumn("machine_number");
        });
    }
}
