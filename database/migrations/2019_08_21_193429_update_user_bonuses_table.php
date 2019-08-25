<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE user_bonuses MODIFY COLUMN type ENUM('money', 'item')");

        Schema::table('user_bonuses', function ($table) {
            $table->integer('item_bonus_id')->nullable()->after('user_id');
            $table->integer('money_bonus_id')->nullable()->after('item_bonus_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_bonuses', function (Blueprint $table) {
            $table->dropColumn('item_bonus_id');
            $table->dropColumn('money_bonus_id');
        });
    }
}
