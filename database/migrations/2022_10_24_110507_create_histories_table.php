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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('via');
            $table->integer('point')->default(0);
            $table->timestamps();
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->foreignId('member_id')->nullable()->constrained('members')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
        });
        Schema::dropIfExists('histories');
    }
};
