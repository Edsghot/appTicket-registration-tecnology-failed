<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tteachers', function (Blueprint $table) {
            $table->char('idTeacher', 13)->primary();
            $table->char('admin_id', 13);
            $table->foreign('admin_id')->references('idAdmin')->on('tadmins');
            $table->string('code');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('occupation');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tteachers');
    }
};
