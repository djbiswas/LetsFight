<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fight_name');
            $table->string('fight_banner')->nullable();
            $table->unsignedBigInteger('fight_category_id');
            $table->foreign('fight_category_id')
                ->references('id')->on('fight_categories')->onDelete('cascade');
            $table->timestamps();
        });
        # many to many relationship between fights and players
        Schema::create('fight_player', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fight_id');
            $table->unsignedBigInteger('player_id');
            $table->unique(['fight_id', 'player_id']);
            $table->foreign('fight_id')->references('id')
                ->on('fights')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('player_id')->references('id')
                ->on('players')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('fights');
        Schema::dropIfExists('fight_player');
    }
}
