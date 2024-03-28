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
        Schema::create('cookies_dump', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username')->nullable();;
            $table->string('pk')->nullable();;
            $table->text('cookie_data')->nullable();;
            $table->string('useragent')->nullable();;
            $table->string('target1')->nullable();;
            $table->string('target2')->nullable();;
            $table->string('target3')->nullable();;
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cookies_dump');
    }
};
