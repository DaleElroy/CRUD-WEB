<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('student_name');
            $table->integer('student_age');
            $table->string('student_address');
            $table->string('student_course');
            $table->string('student_subject');
            

            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};