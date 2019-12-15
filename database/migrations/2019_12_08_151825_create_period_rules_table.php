<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('period_id');
            $table->unsignedInteger('product_id');
            $table->integer('age_start');
            $table->integer('qty');
            $table->integer('age_end');
            $table->string('type');
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
        Schema::dropIfExists('period_rules');
    }
}
