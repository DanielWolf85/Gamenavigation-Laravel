<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
    //  * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('cover')->nullable();
            $table->boolean('is_published')->default(0);
            $table->text('info')->default('none');
            $table->string('creator')->default('none');
            $table->string('label')->default('none');
            $table->string('platforms')->default('none');
            $table->string('realise')->default('none');
            $table->string('genre')->default('none');
            $table->string('model')->default('none');
            $table->string('age_limit')->default('none');
            $table->string('processor_min')->default('none');
            $table->string('processor_max')->default('none');
            $table->string('ram_min')->default('none');
            $table->string('ram_max')->default('none');
            $table->string('video_card_min')->default('none');
            $table->string('video_card_max')->default('none');
            $table->string('hdd_space_min')->default('none');
            $table->string('hdd_space_max')->default('none');
            $table->string('os_min')->default('none');
            $table->string('os_max')->default('none');
            $table->text('facts')->default('none');

            
            $table->timestamp('deleted_at')->nullable();

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
        Schema::dropIfExists('games');
    }
}
