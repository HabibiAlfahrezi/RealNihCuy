<?php

use App\Models\Company;
use App\Models\Pekerjaan;
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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');;
            $table->foreignIdFor(Pekerjaan::class)->constrained()->onDelete('cascade');;
            $table->foreignIdFor(Company::class)->constrained()->onDelete('cascade');;
            $table->string('stage')->default('inreview');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
