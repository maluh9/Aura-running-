<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // A coluna user_id já existe no banco.
        // Por isso, não precisamos criá-la novamente.
    }

    public function down(): void
    {
        // Não removemos user_id porque ela já fazia parte da estrutura.
    }
};