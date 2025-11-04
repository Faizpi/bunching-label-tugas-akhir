<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeExtraFieldsTypeInLabelsTable extends Migration
{
    public function up()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->decimal('extra_weight', 10, 2)->nullable()->change();
            $table->decimal('extra_length', 10, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->integer('extra_weight')->nullable()->change();
            $table->integer('extra_length')->nullable()->change();
        });
    }
}
