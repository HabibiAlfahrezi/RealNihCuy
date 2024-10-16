<?php

use App\Models\JobType;
use App\Models\Pekerjaan;
use App\Models\Skill;
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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('pekerjaan_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pekerjaan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Skill::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('pekerjaan_skill');
    }
};
