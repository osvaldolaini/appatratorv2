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
        Schema::create('essay_users', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->dateTime('performed_at')->nullable();
            $table->dateTime('send_at')->nullable();
            $table->dateTime('upload_rating_at')->nullable();
            $table->string('code')->nullable();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('essay_id')
            ->constrained('essays')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('topic_id')
            ->constrained('topics')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();$table->foreignId('voucher_id')
            ->constrained('vouchers')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('essay_users');
    }
};
