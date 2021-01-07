<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('game_id');
            
            $table->string('title');
            $table->string('image_1')->nullable();
            $table->string('content_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('content_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('content_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('content_4')->nullable();

            $table->boolean('is_published')->default(0);

            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');
            
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
        Schema::dropIfExists('acts');
    }
}
