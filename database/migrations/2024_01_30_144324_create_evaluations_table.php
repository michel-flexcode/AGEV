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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedTinyInteger('quality_of_course_material')->default(0); // qualité du support de cours
            $table->unsignedTinyInteger('quality_of_exercises')->default(0); // qualité des exercices proposés
            $table->unsignedTinyInteger('interest_in_course')->default(0); // intérêt que vous avez porté au cours
            $table->unsignedTinyInteger('interaction_possibility')->default(0); // possibilités de participation au cours (interaction)
            $table->unsignedTinyInteger('assessment_mode')->default(0); // mode d'évaluation du cours
            $table->unsignedTinyInteger('links_with_other_courses')->default(0); // liens avec les autres cours de la formation
            $table->unsignedTinyInteger('equipment_provided')->default(0); // équipement mis à votre disposition
            $table->unsignedTinyInteger('practical_part')->default(0); // partie pratique du cours
            $table->unsignedTinyInteger('relationship_with_class_and_teacher')->default(0); // relations entre la classe et le professeur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
