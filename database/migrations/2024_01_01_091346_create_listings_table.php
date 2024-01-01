<?php

use App\Models\User;
use App\Models\Package;
use App\Models\Category;
use App\Models\Location;
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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Location::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Package::class)->nullable();

            $table->string('image');
            $table->string('thumbnail');
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->string('slug');
            $table->text('description');
            $table->string('seo_description')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('website')->nullable();

            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('whatsapp_link')->nullable();

            $table->boolean('is_verified')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->integer('views')->default(0);
            $table->text('goggle_map_embed_code')->nullable();
            $table->string('attachement')->nullable();
            $table->boolean('status')->default(1);
            $table->date('expire_at');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};