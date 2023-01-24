<?php

use App\Enums\PostStatusEnum;
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
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', array_map(fn ($status) => $status->value, PostStatusEnum::cases()))->default(PostStatusEnum::PENDING->value);
            $table->longtext('title');
            $table->longtext('description')->nullable();
            $table->boolean('nsfw')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('r')->nullable();
            $table->integer('g')->nullable();
            $table->integer('b')->nullable();
            $table->longText('caption')->nullable();
            $table->longtext('image_original')->nullable();
            $table->longtext('image_thumbnail')->nullable();
            $table->longtext('image_cv')->nullable();
            $table->longtext('local_file_path');
            $table->longtext('cv_info')->nullable();
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
