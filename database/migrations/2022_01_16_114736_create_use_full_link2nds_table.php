<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseFullLink2ndsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_full_link2nds', function (Blueprint $table) {
            $table->id();
            $table->string('name1');
            $table->string('link1');
            $table->string('name2');
            $table->string('link2');
            $table->string('name3');
            $table->string('link3');
            $table->string('name4');
            $table->string('link4');
            $table->string('name5');
            $table->string('link5');
            $table->string('name6');
            $table->string('link6');
            $table->string('add_by');
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
        Schema::dropIfExists('use_full_link2nds');
    }
}
