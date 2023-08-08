<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Không được bỏ trống
            $table->string('gender')->nullable(); // Không bỏ trống
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('image')->nullable(); // Đặt giá trị mặc định
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
