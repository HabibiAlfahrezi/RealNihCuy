<?php

use App\Models\JobType;
use App\Models\Pekerjaan;
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
        Schema::create('job_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('status')->default('active');
            $table->timestamps();
        });
  
        Schema::create('pekerjaan_job_type', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pekerjaan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(JobType::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_types');
        Schema::dropIfExists('pekerjaan_job_type');
    }
};
