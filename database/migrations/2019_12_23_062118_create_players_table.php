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
            $table->string('image')->nullable();
            $table->unsignedBigInteger('weapon_id')->default('1');
            $table->foreign('weapon_id')->references('id')->on('weapons')->onUpdate('cascade');
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
        Schema::dropIfExists('players');
    }
}
