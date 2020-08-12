<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_limits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('balance');
        });

        $t = new \App\Models\MoneyLimit();
        $t->balance = 500;
        $t->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('money_limits');
    }
}
