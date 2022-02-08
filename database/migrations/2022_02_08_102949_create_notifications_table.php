<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->foreignUuid('to')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('from')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('helpdesk_id')->nullable()->constrained('helpdesks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('helpdesk_step_id')->nullable()->constrained('helpdesk_steps')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('mak_id')->nullable()->constrained('maks')->onUpdate('cascade')->onDelete('cascade');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
