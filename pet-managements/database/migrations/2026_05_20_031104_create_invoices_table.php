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

            // Liên kết tới products.id
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // Snapshot dữ liệu sản phẩm
            $table->string('product_name');

            // Giá tại thời điểm mua
            $table->decimal('price', 10, 2);

            // Số lượng mua
            $table->integer('quantity')->default(1);

            // Tổng tiền
            $table->decimal('total_amount', 10, 2);

            // Phương thức thanh toán
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