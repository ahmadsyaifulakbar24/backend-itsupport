<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('helpdesk_step_id')->constrained('helpdesk_steps');
            $table->foreignUuid('monitoring_id')->constrained('monitorings');
            $table->enum('type', ['helpdesk_step', 'monitoring']);
            $table->foreignUuid('action_by')->constrained('users');
            $table->string('history');
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
        Schema::dropIfExists('histories');
    }
}
