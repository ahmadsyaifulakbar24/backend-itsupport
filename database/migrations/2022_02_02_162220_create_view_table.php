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

                CASE b.status
                WHEN 'process' THEN 50
                WHEN 'finish' THEN 100
                ELSE 0 END AS progress,

                b.created_at,
                b.updated_at
            FROM params as a
            LEFT JOIN monitorings as b ON b.milestone_id = a.id
            WHERE a.category = 'milestone'
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_user_by_eselon1");
        DB::statement("
            CREATE VIEW vw_total_user_by_eselon1 AS
            SELECT 
                a.id,
                a.param as eselon1,
                COUNT(CASE WHEN b.eselon1_id IS NOT NULL THEN 1 END) as total
            FROM params AS a
            LEFT JOIN users AS b ON b.eselon1_id = a.id
            WHERE a.category = 'eselon1'
            GROUP BY a.id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_total_helpdesk_by_service_category");
        DB::statement("
            CREATE VIEW vw_total_helpdesk_by_service_category AS
            SELECT 
                a.id,
                a.category,
                COUNT(CASE WHEN b.service_category_id IS NOT NULL THEN 1 END) AS total_submission,
                COUNT(CASE WHEN b.status = 'pending' THEN 1 END) AS pending,
                COUNT(CASE WHEN b.status = 'process' THEN 1 END) AS process,
                COUNT(CASE WHEN b.status = 'finish' THEN 1 END) AS finish,
                COUNT(CASE WHEN b.status = 'reject' THEN 1 END) AS reject
            FROM service_categories AS a
            LEFT JOIN helpdesks as b ON b.service_category_id = a.id
            GROUP BY a.id
        ");

        DB::statement("DROP VIEW IF EXISTS vw_mak_detail");
        DB::statement("
            CREATE VIEW vw_mak_detail AS
            SELECT 
                a.id,
                a.budged_activity_id,
                a.code_mak,
                a.budged,
                a.status,
                round((SUM(b.progress) / (COUNT(*) * 100) * 100), 2) AS progress,
                a.created_at,
                a.updated_at
            FROM maks AS a
            LEFT JOIN vw_monitoring_detail AS b ON b.mak_id = a.id
            GROUP BY a.id;
        ");

        DB::statement("DROP VIEW IF EXISTS vw_budged_activity_detail");
        DB::statement("
            CREATE VIEW vw_budged_activity_detail AS
            SELECT
                a.id,
                a.activity_name,
                a.category_id,
                a.client_id,
                SUM(b.budged) as total_budged,
                round((SUM(b.progress) / (COUNT(b.id) * 100) * 100), 2) AS progress,
                if((SUM(b.progress) / (COUNT(b.id) * 100) * 100) < 100, 'process', 'finish') AS status,
                a.created_at,
                a.updated_at
            FROM budged_activities AS a 
            LEFT JOIN vw_mak_detail AS b ON b.budged_activity_id = a.id
            GROUP BY a.id
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
