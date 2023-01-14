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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('height');
            $table->integer('width');
            $table->boolean('nsfw')->default(false);
            $table->integer('r');
            $table->integer('g');
            $table->integer('b');
            $table->longtext('title');
            $table->longtext('description')->nullable();
            $table->longtext('image_original');
            $table->longtext('image_thumbnail');
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
        Schema::dropIfExists('posts');
    }
};
