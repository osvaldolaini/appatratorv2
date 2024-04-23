<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePivotCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_pivot_categories', function (Blueprint $table) {
            /*Config */
            $table->id();
            /*End Config */
            /*Custom */
            $table->unsignedBigInteger('courses_id')->nullable();
            $table->unsignedBigInteger('category_courses_id')->nullable();
            /*End Custom */
            /*Log */
            $table->timestamps();
            $table->string('updated_by',50)->nullable();
            $table->string('created_by',50)->nullable();
            /*End Log */
            /*Relacionamentos */
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('SET NULL');
            $table->foreign('category_courses_id')->references('id')->on('category_courses')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_pivot_categories');
    }
}
