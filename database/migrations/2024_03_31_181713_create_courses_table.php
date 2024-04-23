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
        Schema::create('courses', function (Blueprint $table) {
           /*Config */
            $table->id();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->boolean('active')->nullable();
            $table->integer('views')->nullable();
            /*End Config */
            /*Custom */
            $table->string('code')->nullable();
            $table->string('price_id')->unique()->nullable();
            $table->boolean('highlighted')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('large_description')->nullable();
            $table->string('meta_tags')->nullable();
            $table->string('link')->nullable();
            $table->string('youtube_link')->nullable();
            /*images */
            $table->string('image')->nullable();
            /*End Custom */
            /*Log */
            $table->timestamps();
            $table->string('updated_by', 50)->nullable();
            $table->string('created_by', 50)->nullable();
            /*Excluido */
            $table->date('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
