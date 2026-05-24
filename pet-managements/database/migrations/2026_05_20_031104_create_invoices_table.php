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

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('product_name');

            $table->decimal('price', 10, 2);

            $table->integer('quantity')->default(1);

            $table->decimal('total_amount', 10, 2);

            $table->enum('payment_method', [
                'cash',
                'momo',
                'banking'
            ]);

            // Trạng thái hóa đơn
            $table->enum('status', [
                'completed',
                'cancelled'
            ])->default('completed');

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