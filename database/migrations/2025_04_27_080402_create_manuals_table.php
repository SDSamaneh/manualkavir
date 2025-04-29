<?php

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
        Schema::create('manuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('motormodel_id')->constrained('motormodels')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('year');
            $table->string('urlkavir')->nullable();
            $table->string('urlother')->nullable();
            $table->string('urlnetwork')->nullable();
            $table->string('fileCoc')->nullable();
            $table->string('userGuideFa')->nullable();
            $table->string('userGuideEn')->nullable();
            $table->string('repairGuideFa')->nullable();
            $table->string('repairGuideEn')->nullable();
            $table->string('partsGuide')->nullable();
            $table->string('pdi')->nullable();
            $table->string('periodicService')->nullable();
            $table->string('Bulletin1')->nullable();
            $table->string('Bulletin2')->nullable();
            $table->string('Bulletin3')->nullable();
            $table->string('Bulletins')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuals');
   

    }
};
