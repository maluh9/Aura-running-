<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('payment_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_type')->nullable();

            $table->string('payment_status_detail')->nullable();

            $table->longText('pix_copy_paste')->nullable();
            $table->longText('pix_qr_code_base64')->nullable();

            $table->text('payment_ticket_url')->nullable();

            $table->timestamp('payment_expires_at')->nullable();
            $table->timestamp('paid_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'payment_id',
                'payment_method',
                'payment_type',
                'payment_status_detail',
                'pix_copy_paste',
                'pix_qr_code_base64',
                'payment_ticket_url',
                'payment_expires_at',
                'paid_at',
            ]);
        });
    }
};