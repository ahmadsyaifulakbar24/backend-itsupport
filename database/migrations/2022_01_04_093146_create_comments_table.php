<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('helpdesk_step_id')->nullable()->constrained('helpdesk_steps')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('monitoring_id')->nullable()->constrained('monitorings')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('type', ['helpdesk_step', 'monitoring']);
            $table->foreignUuid('user_id')->constrained('users');
            $table->uuid('parent_id')->nullable();
            $table->text('comment');
            $table->timestamps();
        });

        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('comments')->onDetele('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
