<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackPivotCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack_pivot_courses', function (Blueprint $table) {
            /*Config */
            $table->id();
            /*End Config */
            /*Custom */
            $table->boolean('active')->nullable();
            $table->integer('order')->nullable();
            $table->string('title')->nullable();
            $table->boolean('highlighted')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('see_value')->nullable();
            $table->string('value', $precision = 10, $scale = 2)->nullable();
            $table->integer('qtd_parcel')->nullable();
            $table->string('value_parcel', $precision = 10, $scale = 2)->nullable();
            $table->string('link_hotmart')->nullable();
            $table->foreignId('courses_id')
                ->constrained('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('price_id')->unique()->nullable();

            /*End Custom */
            /*Log */
            $table->timestamps();
            $table->string('updated_by', 50)->nullable();
            $table->string('created_by', 50)->nullable();
            /*End Log */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pack_pivot_courses');
    }
}
