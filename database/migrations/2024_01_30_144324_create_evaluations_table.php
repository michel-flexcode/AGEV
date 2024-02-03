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
            $table->unsignedTinyInteger('quality_of_course_material')->default(0); // (Question 5)qualité du support de cours
            $table->unsignedTinyInteger('quality_of_exercises')->default(0); // (Question 5)qualité des exercices proposés
            $table->unsignedTinyInteger('interest_in_course')->default(0); // (Question 5)intérêt que vous avez porté au cours
            $table->unsignedTinyInteger('interaction_possibility')->default(0); // (Question 5)possibilités de participation au cours (interaction)
            $table->unsignedTinyInteger('assessment_mode')->default(0); // (Question 5)mode d'évaluation du cours
            $table->unsignedTinyInteger('links_with_other_courses')->default(0); // (Question 5)liens avec les autres cours de la formation
            $table->unsignedTinyInteger('equipment_provided')->default(0); // (Question 5)équipement mis à votre disposition
            $table->unsignedTinyInteger('practical_part')->default(0); // (Question 5)partie pratique du cours
            $table->unsignedTinyInteger('relationship_with_class_and_teacher')->default(0); // (Question 5)relations entre la classe et le professeur
            $table->string('general_comments', 500)->nullable(); // Commentaires généraux (Question 6)
            $table->unsignedTinyInteger('course_difficulty')->default(0); // Difficulté perçue du cours (Question 7)
            $table->text('course_contribution')->nullable(); // Contributions du cours (Question 8)
            $table->boolean('notes_paper_format')->default(false); // Notes au format papier (Question 9)
            $table->boolean('notes_pdf_format')->default(false); // Notes au format PDF (téléchargeables) (Question 9)
            $table->boolean('notes_during_lecture')->default(false); // Prise de notes pendant le cours (Question 9)
            $table->string('notes_other_format', 255)->nullable(); // Autres formats de notes (Question 9)
            $table->unsignedTinyInteger('learning_adaptation')->default(0); // Adaptation à de nouvelles matières (Question 10)
            $table->boolean('course_objectives_school_brochure')->default(false); // Objectifs du cours via brochure de l'école (Question 11)
            $table->boolean('course_objectives_class_handout')->default(false); // Objectifs du cours via document remis en classe (Question 11)
            $table->boolean('course_objectives_oral')->default(false); // Objectifs du cours évoqués oralement en classe (Question 11)
            $table->boolean('course_objectives_online')->default(false); // Objectifs du cours via l'Intranet ou site du professeur (Question 11)
            $table->boolean('course_objectives_absent')->default(false); // Absence lors de la transmission des objectifs (Question 11)
            $table->boolean('course_objectives_not_transmitted')->default(false); // Objectifs du cours non transmis (Question 11)
            $table->boolean('course_objectives_not_interested')->default(false); // Pas d'intérêt pour les objectifs du cours (Question 11)
            $table->string('course_objectives_other', 255)->nullable(); // Autres situations pour la connaissance des objectifs (Question 11)
            $table->enum('objectives_achieved', ['oui', 'non', 'sans_avis'])->default('sans_avis');// Nouveau champ pour la (question 12)
            $table->text('objectives_achieved_comment')->nullable();            // Nouveau champ pour la question 13
            $table->unsignedTinyInteger('course_material_quantity')->default(2); // Évaluation de la quantité de matière vue en cours question 14
            $table->enum('info_before_tests', ['insuffisant', 'faible', 'satisfaisant', 'bon', 'très_bon'])->default('satisfaisant');//question 15
            $table->enum('clarity_of_test_grading', ['insuffisant', 'faible', 'satisfaisant', 'bon', 'très_bon'])->default('satisfaisant');//question 15
            $table->enum('clarity_of_exam_grading', ['insuffisant', 'faible', 'satisfaisant', 'bon', 'très_bon'])->default('satisfaisant');//question 15
            $table->enum('assessment_relevance', ['pas_du_tout', 'plutôt_non', 'sans_avis', 'plutôt_oui', 'tout_à_fait'])->default('sans_avis');//question 16
            $table->text('assessment_relevance_comment')->nullable();//question 17
            $table->boolean('solutions_provided_for_weaknesses')->default(false);//question 18
            $table->text('most_appreciated_in_training')->nullable();//question 19
            $table->text('least_appreciated_in_training')->nullable();//question 20
            $table->text('general_remarks')->nullable(); //question 21
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
