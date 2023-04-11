<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('trading')->nullable();
            $table->string('trading_time')->nullable();
            $table->boolean('buy_sell')->nullable();
            $table->boolean('macd_enable')->nullable();
            $table->string('macd_source')->nullable();
            $table->integer('macd_fast_length')->nullable();
            $table->integer('macd_fast_width')->nullable();
            $table->string('macd_fast_line_color')->nullable();
            $table->integer('macd_slow_length')->nullable();
            $table->integer('macd_slow_width')->nullable();
            $table->string('macd_slow_line_color')->nullable();
            $table->integer('macd_histogram')->nullable();
            $table->string('macd_histogram_up_color')->nullable();
            $table->string('histogram_down_color')->nullable();
            $table->boolean('rsi_enable')->nullable();
            $table->string('rsi_source')->nullable();
            $table->integer('rsi_length')->nullable();
            $table->integer('rsi_width')->nullable();
            $table->string('rsi_color')->nullable();
            $table->boolean('ema_enable')->nullable();
            $table->string('ema_source')->nullable();
            $table->integer('ema_length')->nullable();
            $table->integer('ema_width')->nullable();
            $table->string('ema_color')->nullable();
            $table->boolean('sma_enable')->nullable();
            $table->string('sma_source')->nullable();
            $table->integer('sma_length')->nullable();
            $table->integer('sma_width')->nullable();
            $table->string('sma_color')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
