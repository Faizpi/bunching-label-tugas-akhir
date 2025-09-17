<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncrementsTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('increments_new', function (Blueprint $table) {
            $table->id();
            $table->integer('machine_number');   // misal 118, 119, 120
            $table->date('shift_date');          // reset berdasarkan tanggal
            $table->integer('last_number')->default(0);
            $table->timestamps();

            $table->unique(['machine_number', 'shift_date']); // unik per mesin & hari
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('increments_new');
    }
}
