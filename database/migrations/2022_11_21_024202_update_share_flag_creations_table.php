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
        Schema::table('creations', function (Blueprint $table) {
            $table->tinyInteger('share_whatsapp')->unsigned()->default(0);
            $table->tinyInteger('share_facebook')->unsigned()->default(0);
            $table->tinyInteger('share_twitter')->unsigned()->default(0);
            $table->tinyInteger('share_instagram')->unsigned()->default(0);
            $table->tinyInteger('share_email')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
