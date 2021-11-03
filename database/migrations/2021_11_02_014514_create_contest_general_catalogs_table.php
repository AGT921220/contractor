<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestGeneralCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_general_catalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyect_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('general_catalog_id')->unsigned();
            $table->integer('contest_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('proyect_id')->references('id')->on('proyects');
            $table->foreign('general_catalog_id')->references('id')->on('general_catalogs');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_general_catalogs');
    }
}
