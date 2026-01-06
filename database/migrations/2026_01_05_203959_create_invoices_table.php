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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('issued_by')->nullable()->constrained('users')->nullOnDelete();

            $table->string('number')->unique();
            $table->string('type')->default('retainer'); // retainer|project|success_fee
            $table->string('currency', 3)->default('USD');
            $table->decimal('amount', 15, 2);
            $table->string('status')->default('draft'); // draft|sent|partially_paid|paid|void|overdue

            $table->date('issued_at')->nullable();
            $table->date('due_at')->nullable();
            $table->date('paid_at')->nullable();

            $table->unsignedTinyInteger('advance_required_percent')->default(0); // e.g. 50 for project invoices
            $table->decimal('advance_paid_amount', 15, 2)->default(0);

            $table->decimal('success_fee_percent', 5, 2)->nullable();
            $table->decimal('incremental_profit_amount', 15, 2)->nullable();

            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
