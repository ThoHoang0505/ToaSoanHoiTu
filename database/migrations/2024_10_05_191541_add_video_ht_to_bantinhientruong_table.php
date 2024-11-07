<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bantinhientruong', function (Blueprint $table) {
            $table->string('Video_HT')->nullable();
    });
    }

    public function down()
    {
    Schema::table('bantinhientruong', function (Blueprint $table) {
        $table->dropColumn('Video_HT');
        });
    }
};
