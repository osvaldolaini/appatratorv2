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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->dateTime('limit_access')->nullable();
            $table->integer('qtd')->nullable();
            $table->string('application')->nullable();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('plan_id')
            ->nullable()
            ->constrained('plans')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('code')->nullable();

            $table->dateTime('send_date')->nullable();
            $table->string('send_email')->nullable();
            $table->string('sended_by')->nullable();

            $table->string('updated_by',50)->nullable();
            $table->string('created_by',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
