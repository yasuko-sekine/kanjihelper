<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mareas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prefs_id')->unsigned()->index();
            $table->string('code');
            $table->string('name');
            $table->string('pref_code');
            $table->string('pref_name');
            $table->timestamps();
            
            $table->foreign('prefs_id')->references('id')->on('prefs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mareas');
    }
}
