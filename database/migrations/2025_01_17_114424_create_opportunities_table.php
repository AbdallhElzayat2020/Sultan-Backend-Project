<?php

use App\Enums\OpportunityType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('education');
            $table->string('years_of_exp');
            $table->string('field_of_exp')->nullable();
            $table->string('job_title')->nullable();
            $table->enum('type', OpportunityType::values())->comment(OpportunityType::comment());
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
