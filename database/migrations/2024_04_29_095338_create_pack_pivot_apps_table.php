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
        Schema::create('pack_pivot_apps', function (Blueprint $table) {
            /*Config */
            $table->id();
            /*End Config */
            /*Custom */
            $table->boolean('active')->nullable();
            $table->integer('order')->nullable();
            $table->string('title')->nullable();
            $table->string('application')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('see_value')->nullable();
            $table->string('value', $precision = 10, $scale = 2)->nullable();
            $table->integer('qtd_parcel')->nullable();
            $table->string('value_parcel', $precision = 10, $scale = 2)->nullable();
            $table->string('link_hotmart')->nullable();
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
     */
    public function down(): void
    {
        Schema::dropIfExists('pack_pivot_apps');
    }
};
