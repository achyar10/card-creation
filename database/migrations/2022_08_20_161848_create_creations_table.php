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
        Schema::create('creations', function (Blueprint $table) {
            $table->id();
            $table->text('url_path')->nullable();
            $table->timestamps();
        });

        Schema::table('creations', function (Blueprint $table) {
            $table->foreignId('member_id')->nullable()->constrained('members')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('card_id')->nullable()->constrained('cards')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creations', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['card_id']);
        });
        Schema::dropIfExists('creations');
    }
};
