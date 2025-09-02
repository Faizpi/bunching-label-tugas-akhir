<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string('lot_number', 15)->index();
            $table->string('size', 30)->nullable()->default(null);
            $table->double('length')->nullable()->default(0);
            $table->double('weight')->nullable()->default(0);
            $table->date('shift_date')->nullable()->default(null);
            $table->string('shift', 10)->nullable()->default(null);
            $table->integer('machine_number')->nullable()->default(0);
            $table->double('pitch')->nullable()->default(0);
            $table->char('direction', 5)->default('S');
            $table->char('visual', 5)->nullable()->default(null);
            $table->unsignedBigInteger("operator_id");
            $table->text('remark')->nullable()->default(null);
            $table->string('bobin_no')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
