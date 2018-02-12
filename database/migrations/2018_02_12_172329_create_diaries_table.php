<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_culture_diaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->longText('content');
            $table->integer('emotions')->default(0)->comment('0: Heartbroken, 1: Sad, 2: Normal, 3: Happy, 4: Crazy');
            $table->integer('weather')->default(0)->comment('0: Sunny, 1: Clear, 2: Rain, 3: Mist, 4: Snow, 5: Windy, 6: Tornado');
            $table->integer('status')->default(1)->comment('1: Enable, 0: Disable');
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
        Schema::dropIfExists('personal_culture_diaries');
    }
}
