<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // propriétaire
            $table->string('name');
            $table->string('type');       // equity, fund, bond, real_estate, crypto, cash, other
            $table->string('currency',3)->default('EUR');
            $table->decimal('quantity', 24, 8)->default(0);
            $table->decimal('purchase_unit_price', 24, 8)->default(0); // brut
            $table->decimal('fees_total', 24, 8)->default(0);           // frais globaux
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->index(['user_id','type']);
        });
    }
    public function down(): void { Schema::dropIfExists('assets'); }
};
