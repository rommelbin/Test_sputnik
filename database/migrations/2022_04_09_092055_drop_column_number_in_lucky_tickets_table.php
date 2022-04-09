<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lucky_tickets', function (Blueprint $table) {
            $table->dropColumn('number');
            $table->dropTimestamps();
            $table->dropColumn('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lucky_tickets', function (Blueprint $table) {
            $table->integer('number');
            $table->id();
            $table->timestamps();
        });
    }
};
