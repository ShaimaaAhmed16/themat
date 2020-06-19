<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone')->nullable();
            $table->string('watsUp');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('link_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('link_id')->unsigned();
            $table->string('locale')->index();
            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->unique(['link_id','locale']);
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_translations');
        Schema::dropIfExists('links');
    }
}
