<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS vw_monitoring_detail");
        DB::statement("
            CREATE VIEW vw_monitoring_detail AS
            SELECT
                a.category,
                a.param,
                b.id,
                b.mak_id,
                b.name,
                a.id as milestone_id,
                b.start_date,
                b.finish_date,
                b.description,
                b.status,
                b.created_at,
                b.updated_at
            FROM params as a
            LEFT JOIN monitorings as b ON b.milestone_id = a.id
            WHERE a.category = 'milestone'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('view');
    }
}
