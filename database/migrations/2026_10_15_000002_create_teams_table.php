<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('teams', function (Blueprint $t) {
            $t->id();
            $t->foreignId('tournament_id')->constrained()->cascadeOnDelete();
            $t->string('name'); $t->string('tag', 5); $t->string('city')->nullable();
            $t->unsignedInteger('wins')->default(0); $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('teams'); }
};
