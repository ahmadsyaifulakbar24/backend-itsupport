<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('budged_activity_id')->constrained('budged_activities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('code_mak')->unique();
            $table->bigInteger('budged');
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
        Schema::dropIfExists('maks');
    }
}
