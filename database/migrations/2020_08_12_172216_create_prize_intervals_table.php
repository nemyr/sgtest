<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_intervals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('prize_name');
            $table->integer('min');
            $table->integer('max');
        });

        /*
         * может так и не должно быть, но для отладки пусть будет
         */
        $t = new \App\Models\PrizeIntervals();
        $t->prize_name = 'bonus';
        $t->min = 300;
        $t->max = 1000;
        $t->save();

        $t = new \App\Models\PrizeIntervals();
        $t->prize_name = 'money';
        $t->min = 50;
        $t->max = 100;
        $t->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prize_intervals');
    }
}
