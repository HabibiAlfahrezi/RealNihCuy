<?php

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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');;
            $table->string('name')->nullable();
            $table->string('role')->nullable();
            $table->text('address')->nullable();
            $table->text('image')->nullable();
            $table->text('background')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('language')->nullable();
            $table->text('description')->nullable();
            $table->text('experience')->nullable();
            $table->string('highest_position')->nullable();
            $table->string('current_job')->nullable();
            $table->string('experience_year')->nullable();
            $table->string('work_type')->nullable();
            $table->string('expected_salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
