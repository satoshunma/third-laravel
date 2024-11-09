<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStampsTable extends Migration
{
    public function up()
    {
        Schema::create('stamps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ユーザーID
            $table->timestamp('start_time')->nullable(); // 勤務開始
            $table->timestamp('end_time')->nullable();   // 勤務終了
            $table->timestamp('break_start')->nullable(); // 休憩開始
            $table->timestamp('break_end')->nullable();   // 休憩終了
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stamps');
    }
}
