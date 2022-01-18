<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpdesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpdesks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ticket_number');
            $table->foreignUuid('service_category_id')->constrained('service_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->foreignUuid('email_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->date('from_date')->nullable();
            $table->date('till_date')->nullable();
            $table->time('execution_time')->nullable();
            $table->string('duration')->nullable();
            $table->integer('participant_capacity')->nullable();
            $table->foreignUuid('signature_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('class_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('update_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('complaint_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'process', 'finish']);
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
        Schema::dropIfExists('helpdesks');
    }
}
