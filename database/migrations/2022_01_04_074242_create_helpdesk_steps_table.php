<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpdeskStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpdesk_steps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('helpdesk_id')->constrained('helpdesks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('service_category_step_id')->constrained('service_category_steps')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['open', 'close']);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('helpdesk_steps');
    }
}
