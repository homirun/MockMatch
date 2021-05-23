<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lunches', function(Blueprint $table) {
            $table->date('reserve_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->dropColumn('reserve_date_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lunches', function(Blueprint $table) {
            $table->dropColumn('reserve_date');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
            $table->dateTime('reserve_date_time');
        });
    }
}
