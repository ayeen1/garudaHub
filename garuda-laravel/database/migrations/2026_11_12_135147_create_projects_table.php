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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();   // ← tambahkan
        $table->foreignId('category_id')->constrained()->restrictOnDelete();        // ← tambahkan
        $table->string('title', 200);                                               // ← tambahkan
        $table->text('description');                                                // ← tambahkan
        $table->unsignedBigInteger('budget_min');                                   // ← tambahkan
        $table->unsignedBigInteger('budget_max');                                   // ← tambahkan
        $table->date('deadline');                                                   // ← tambahkan
        $table->enum('status', ['open', 'closed', 'awarded'])->default('open');     // ← tambahkan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
