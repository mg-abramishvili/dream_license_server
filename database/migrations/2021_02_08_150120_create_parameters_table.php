<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->string('dreambox_theme')->nullable();
            $table->string('dreambox_orientation')->nullable();
            $table->string('dreambox_title')->nullable();
            $table->string('dreambox_module_photoalbums')->nullable();
            $table->string('dreambox_module_videoalbums')->nullable();
            $table->string('dreambox_module_news')->nullable();
            $table->string('dreambox_module_routes')->nullable();
            $table->string('dreambox_module_reviews')->nullable();
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
        Schema::dropIfExists('parameters');
    }
}
