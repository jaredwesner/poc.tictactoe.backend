<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('vs_user_id')->nullable();
            $table->bigInteger('game_id');
            // $table->foreign('game_id')->references('id')->on('games');
            $table->string('player_type', 8);
            $table->string('game_status', 32);
            $table->timestamp('status_updated_at')->nullable();
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
        Schema::dropIfExists('user_games');
    }
}
