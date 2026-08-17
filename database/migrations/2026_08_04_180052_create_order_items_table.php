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
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();

                // Pedido
                $table->foreignId('order_id')
                    ->constrained()
                    ->cascadeOnDelete();

                // Produto
                $table->foreignId('product_id')
                    ->constrained()
                    ->cascadeOnDelete();

                // Tamanho escolhido
                $table->string('size');

                // Quantidade
                $table->unsignedInteger('quantity')->default(1);

                // Preço do produto no momento da compra
                $table->decimal('price', 10, 2);

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('order_items');
        }
    };