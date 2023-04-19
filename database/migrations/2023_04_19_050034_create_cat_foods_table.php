<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_foods', function (Blueprint $table) {
            $table->foreignId('cat_id')->constrained('cats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('amount')->default(0);
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
        Schema::dropIfExists('cat_foods');
    }
};
