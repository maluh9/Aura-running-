<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->foreignId('national_team_id')
                ->nullable()
                ->after('category_id')
                ->constrained('national_teams')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign([
                'national_team_id'
            ]);

            $table->dropColumn(
                'national_team_id'
            );

        });
    }
};