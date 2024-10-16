<?php

use App\Models\Social;
use App\Models\Tech;
use App\Models\User;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('role')->nullable();
            $table->string('logo');
            $table->string('name');
            $table->string('founded')->nullable();
            $table->string('website')->nullable();
            $table->string('location')->nullable();
            $table->string('employe')->nullable();
            $table->string('industry')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
