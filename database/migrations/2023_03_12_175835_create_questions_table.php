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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->longText('text')->nullable();
            $table->longText('right_answer')->nullable();
            $table->string('year',4)->nullable();
            $table->string('concurso_for')->nullable();
            $table->integer('dificult_init')->nullable();

            $table->foreignId('institution_id')
            ->constrained('institutions')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('examining_board_id')
            ->constrained('examining_boards')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('occupation_area_indice_id')
            ->constrained('occupation_area_indices')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('education_area_indice_id')
            ->constrained('education_area_indices')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('office_id')
            ->constrained('offices')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('level_id')
            ->constrained('levels')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('modality_id')
            ->constrained('modalities')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('discipline_id')
            ->constrained('disciplines')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('matter_id')
            ->constrained('matters')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('sub_matter_id')
            ->constrained('sub_matters')
            ->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('code')->nullable();
            $table->timestamps();
            $table->string('updated_by',50)->nullable();
            $table->string('created_by',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
