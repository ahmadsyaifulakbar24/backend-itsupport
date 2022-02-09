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
            $table->string('ticket_number')->unique();
            $table->foreignUuid('service_category_id')->constrained('service_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->foreignUuid('email_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->string('integration_of')->nullable();
            $table->string('integration_to')->nullable();
            $table->dateTime('from_date')->nullable();
            $table->dateTime('till_date')->nullable();
            $table->string('participant_capacity')->nullable();
            $table->string('signature')->nullable();
            $table->boolean('zoom_option')->nullable();
            $table->string('zoom_link')->nullable();
            $table->boolean('presence')->nullable();
            $table->foreignUuid('class_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('update_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('complaint_type_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->string('koperasi_name')->nullable();
            $table->string('nik_koperasi')->nullable();
            $table->boolean('need_domain')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('ip_address')->nullable(); 
            $table->boolean('need_hosting')->nullable();
            $table->string('ram')->nullable(); 
            $table->string('size')->nullable(); 
            $table->string('os')->nullable(); 
            $table->string('processor')->nullable(); 
            $table->string('total_vm')->nullable();
            $table->boolean('ip_public')->nullable();
            $table->string('file_sharing_type')->nullable();
            $table->string('needs')->nullable();
            $table->string('total_user')->nullable();
            $table->string('email_admin')->nullable();
            $table->string('location')->nullable();
            $table->string('application_name')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'process', 'finish', 'reject']);
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
