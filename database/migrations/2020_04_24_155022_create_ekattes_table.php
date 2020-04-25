<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkattesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekattes', function (Blueprint $table) {
            $table->integer('ekatte')->primary();
            $table->string('name');
            $table->bigInteger('settlement_id');
            $table->foreign('settlement_id')->references('id')->on('settlements');
            $table->string('province_id', 3);
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->string('municipality_id', 5);
            $table->foreign('municipality_id')->references('id')->on('municipalities');
            $table->string('parish_id', 8);
            $table->foreign('parish_id')->references('id')->on('parishes');
            $table->bigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('document_id');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ekattes');
    }
}
