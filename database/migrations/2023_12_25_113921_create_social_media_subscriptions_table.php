<?php

use App\Models\User;
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
        Schema::create('social_media_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->enum('social_media_type', [
                'adn', 'bitbucket', 'dropbox', 'facebook', 'flickr', 'foursquare', 'github',
                'google', 'instagram', 'linkedin', 'microsoft', 'odnoklassniki', 'openid',
                'pinterest', 'reddit', 'soundcloud', 'tumblr', 'twitter', 'vimeo', 'vk', 'yahoo'
            ]);
            $table->string('social_media_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media_subscriptions');
    }
};
