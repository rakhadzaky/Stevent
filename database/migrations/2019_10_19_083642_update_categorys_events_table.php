<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCategorysEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorys_events', function (Blueprint $table) {
            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categorys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorys_events', function (Blueprint $table) {
            //
        });
    }
}
