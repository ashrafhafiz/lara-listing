<?php

use App\Models\Amenity;
use App\Models\Listing;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('amenity_listing', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Listing::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Amenity::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_listing');
    }
};
