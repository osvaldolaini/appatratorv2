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
        Schema::create('contest_matters', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->string('title')->nullable();
            $table->integer('level')->nullable();
            $table->string('nick')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->nullable();
            $table->string('order_title',30)->nullable();
            $table->foreignId('contest_discipline_id')
                ->constrained('contest_disciplines')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('contest_matters');
    }
};
