<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void{
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('message');
            $table->string('mood');
            $table->Date('reveal_at');
            $table->boolean('is_public')->default(false);
            $table->string('country')->nullable();
            $table->ipAddress('ip_address');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->timestamps();
            #$table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    public function down(): void{
        Schema::dropIfExists('capsules');
    }
};
