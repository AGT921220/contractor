<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_catalogs', function (Blueprint $table) {
            $table->id();
            $table->integer('proyect_id');
            $table->integer('user_id');
            $table->string('area');
            $table->string('subarea')->nullable();
            $table->string('clave');
            $table->string('description');
            $table->integer('measurement_units_id');
            $table->decimal('quantity');
            $table->decimal('unit_price');
            $table->decimal('total');
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
        Schema::dropIfExists('general_catalogs');
    }
}
