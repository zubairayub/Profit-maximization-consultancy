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
        Schema::create('kpi_metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('metric_name'); // e.g., 'ebitda', 'revenue', 'profit_margin', 'cash_flow'
            $table->decimal('value', 15, 2);
            $table->string('period'); // 'monthly', 'quarterly', 'yearly'
            $table->date('period_date'); // The specific month/quarter/year this metric represents
            $table->string('unit')->default('USD'); // USD, percentage, etc.
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index(['client_id', 'metric_name', 'period_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpi_metrics');
    }
};
