<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bonuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->enum('type', ['money, item']);
            $table->enum('status', ['available', 'approval', 'reject', 'ended'])->default('available');
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
        Schema::dropIfExists('user_bonuses');
    }
}
