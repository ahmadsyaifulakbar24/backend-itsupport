<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgedActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budged_activities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('activity_name');
            $table->foreignUuid('category_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('client_id')->constrained('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['pendding', 'process', 'finish']);
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
        Schema::dropIfExists('budged_activities');
    }
}
