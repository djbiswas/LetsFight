<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('Height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('age')->nullable();
            $table->string('from')->nullable();
            $table->string('identity')->nullable();
            $table->string('size')->nullable();
            $table->string('continent')->nullable();
            $table->string('area')->nullable();
            $table->string('speed')->nullable();
            $table->string('attacks')->nullable();
            $table->string('years')->nullable();
            $table->string('role')->nullable();
            $table->string('sport')->nullable();
            $table->string('record')->nullable();
            $table->string('show')->nullable();
            $table->string('game')->nullable();
            $table->string('debut')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('weapon_id')->default('1');
            $table->foreign('weapon_id')->references('id')->on('weapons')->onUpdate('cascade');
            $table->unsignedBigInteger('fight_category_id')->default('1');
            $table->foreign('fight_category_id')->references('id')->on('fight_categories')->onUpdate('cascade');
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
        Schema::dropIfExists('players');
    }
}
