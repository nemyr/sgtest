<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_objects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->nullable()->default(null);
            $table->string('name');
            $table->boolean('is_ordered')->default(false);
            $table->boolean('is_sent')->default(false);
        });

        for ($i = 0; $i < 3; $i++){
            $t = new \App\Models\PrizeObject();
            $t->name = 'obj' . $i;
            $t->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prize_objects');
    }
}
