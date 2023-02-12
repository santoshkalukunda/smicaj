<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trading_layout_id')->constrained('trading_layouts')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
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
        Schema::dropIfExists('layout_views');
    }
}
