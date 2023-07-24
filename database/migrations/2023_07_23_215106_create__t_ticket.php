<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ttickets', function (Blueprint $table) {
            $table->char('idTicket', 13)->primary();
            $table->string('code');
            $table->string('title');
            $table->text('details');
            $table->char('teacher_id', 13);
            $table->foreign('teacher_id')->references('idTeacher')->on('tteachers');
            $table->date('date');
            $table->boolean('status')->default(false);
            $table->char('school_id', 13);
            $table->foreign('school_id')->references('idSchool')->on('tschools');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ttickets');
    }
};
