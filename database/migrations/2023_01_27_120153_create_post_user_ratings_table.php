<?php

use App\Enums\PostRatingEnum;
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
        Schema::create('post_user_ratings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('rating', array_map(fn ($status) => $status->value, PostRatingEnum::cases()))->default(PostRatingEnum::NONE->value);
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
        Schema::dropIfExists('post_user_ratings');
    }
};
