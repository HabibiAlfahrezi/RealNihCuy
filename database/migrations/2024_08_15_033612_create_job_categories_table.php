<?php

use App\Models\JobCategory;
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
        Schema::create('job_categories', function (Blueprint $table) {
            $table->id();
            $table->text('icon')->nullable();
            $table->string('title');
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::create('pekerjaan_job_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pekerjaan::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(JobCategory::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_categories');
        Schema::dropIfExists('pekerjaan_job_categories');
    }
};
