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
        Schema::create('issue_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('issue_card_id')->constrained('issue_cards')->onDelete('cascade');
            $table->dateTime('changed_at');
            $table->text('by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_logs');
    }
};
