<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('params', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('parent_id')->nullable();
            $table->string('category');
            $table->string('param');
            $table->string('alias')->nullable()->unique();
        });

        Schema::table('params', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('params')->onDelete('cascade')->onUpdate('cascade');
            
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('eselon1_id')->references('id')->on('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('eselon2_id')->references('id')->on('params')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('params');
    }
}
