<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('assigned_to')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('subject');
            $table->enum('priority', ['low', 'medium', 'high'])->default('low');
            $table->enum('category', ['hardware', 'software', 'network']);
            $table->text('description');

            $table->enum('status', ['open', 'in_progress', 'solved'])->default('open');

            $table->timestamps();

            $table->index(['status', 'priority', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
