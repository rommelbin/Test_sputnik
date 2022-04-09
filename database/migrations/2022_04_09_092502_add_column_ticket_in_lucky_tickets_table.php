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
            $table->integer('ticket')->unique();
            $table->id();
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
        Schema::table('lucky_tickets', function (Blueprint $table) {
            $table->dropColumn('ticket');
            $table->dropColumn('id');
            $table->dropTimestamps();
        });
    }
};
