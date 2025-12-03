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
        Schema::create('issue_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->time('time')->nullable();
            $table->text('issue')->nullable();
            $table->text('title')->nullable();
            $table->text('category')->nullable();
            $table->text('severity')->nullable();
            $table->text('status')->nullable();
            $table->text('approved_by')->nullable();
            $table->boolean('approved')->nullable()->default(false);
            $table->boolean('canceled_by_user')->nullable()->default(false);
            $table->date('canceled_by_user_date')->nullable();
            $table->date('approved_date')->nullable();
            $table->boolean('tech_view')->nullable()->default(false);
            $table->date('tech_view_date')->nullable();
            $table->text('assigned_by')->nullable();
            $table->text('note')->nullable();
            $table->boolean('task_completed')->nullable()->default(false);
            $table->boolean('task_completed_approved')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_cards');
    }
};
