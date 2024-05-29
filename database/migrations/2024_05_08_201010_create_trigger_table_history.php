<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggerTableHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared('
        //     CREATE TRIGGER table_history_trigger
        //     AFTER INSERT ON ibadah_minggu_raya
        //     FOR EACH ROW
        //     BEGIN
        //         INSERT INTO table_history (column1, column2, ...)
        //         VALUES (NEW.column1, NEW.column2, ...);
        //     END
        //     CREATE TRIGGER delete_history_trigger
        //     AFTER DELETE ON your_table
        //     FOR EACH ROW
        //     BEGIN
        //         INSERT INTO table_history (column1, column2, ...)
        //         VALUES (OLD.column1, OLD.column2, ...);
        //     END
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS table_history_trigger');
    }
}
