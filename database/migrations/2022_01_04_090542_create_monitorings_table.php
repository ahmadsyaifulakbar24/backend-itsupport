<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('mak_id')->constrained('maks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->foreignUuid('milestone_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->date('start_date');
            $table->date('finish_date');
            $table->text('description');
            $table->enum('status', ['pending', 'process', 'finish'])->default('pending');
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
        Schema::dropIfExists('monitorings');
    }
}
