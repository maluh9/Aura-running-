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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Usuário que fez o pedido
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Número do pedido
            $table->string('order_number')->unique();

            // Valor total
            $table->decimal('total', 10, 2);

            // Status do pedido
            $table->string('status')->default('pedido_realizado');

            // Status do pagamento
            $table->string('payment_status')->default('pendente');

            // Código/link de rastreamento
            $table->string('tracking_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};