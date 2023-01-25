<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Managers\Preferences\Seeders\DefaultPreferenceSeederManager;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->longtext('default_value');
            $table->longText('validation');
            $table->timestamps();
        });

        $__DefaultPreferenceSeederManager = new DefaultPreferenceSeederManager();
        $__DefaultPreferenceSeederManager->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
};
