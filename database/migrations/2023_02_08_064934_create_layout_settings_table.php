<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trading_layout_id')->constrained('trading_layouts')->cascadeOnDelete();
            $table->unsignedBigInteger('View_1')->nullable();
            $table->unsignedBigInteger('View_2')->nullable();
            $table->unsignedBigInteger('View_3')->nullable();
            $table->unsignedBigInteger('View_4')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('layout_settings');
    }
}
