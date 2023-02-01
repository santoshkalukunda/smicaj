<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_settings', function (Blueprint $table) {
            $table->id();
            $table->string('trading')->nullable();
            $table->string('trading_time')->nullable();
            $table->string('buy_sell')->nullable();
            $table->string('interval')->nullable();
            // $table->string('studies')->nullable();
            $table->string('style')->nullable();
            $table->string('theme')->nullable();
            $table->string('timezone')->nullable();
            $table->string('locale')->nullable();
            $table->string('range')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('hide_top_toolbar')->nullable();
            $table->string('withdateranges')->nullable();
            $table->string('hide_side_toolbar')->nullable();
            $table->string('details')->nullable();
            $table->string('calendar')->nullable();
            $table->string('hotlist')->nullable();
            $table->string('enable_publishing')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('trading_settings');
    }
}
