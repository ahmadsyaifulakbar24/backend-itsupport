<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('helpdesk_id')->nullable()->constrained('helpdesks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('helpdesk_step_id')->nullable()->constrained('helpdesk_steps')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('monitoring_id')->nullable()->constrained('monitorings')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['helpdesk', 'helpdesk_step', 'monitoring']);
            $table->string('file_name');
            $table->string('path');
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
        Schema::dropIfExists('files');
    }
}
