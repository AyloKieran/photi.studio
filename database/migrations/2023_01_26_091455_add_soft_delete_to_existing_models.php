<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $__tables = [
        'users',
        'posts',
        'tags',
        'post_tag',
        'preferences',
        'user_preferences',
    ];

    public function up()
    {
        foreach ($this->__tables as $_table) {
            Schema::table($_table, function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        foreach ($this->__tables as $_table) {
            Schema::table($_table, function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
};
