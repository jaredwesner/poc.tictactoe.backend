<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGameStateToUserGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_games', function (Blueprint $table) {
            // Should use json column, however my local mysql is 5.4
            $table->longText('game_state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_games', function (Blueprint $table) {
            $table->dropColumn('game_state');
        });
    }
}
