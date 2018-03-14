<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kshopid');
            $table->string('name');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('url');
            $table->string('url_mobile');
            $table->string('image_url');
            $table->string('access');            
            $table->string('pr');            
            $table->string('budget');               
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
        Schema::drop('kshops');
    }
}
