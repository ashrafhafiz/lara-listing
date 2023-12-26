<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'profile_banner',
        'email',
        'gender',
        'phone',
        'address',
        'website',
        'bio',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    // Define a new accessor
    public function getNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function social_media_subscriptions(): HasMany
    {
        return $this->hasMany(SocialMediaSubscription::class, 'user_id');
    }

    public function hasFacebook()
    {
        // foreach ($this->social_media_subscriptions as $sms) {
        //     if ($sms->social_media_type === 'facebook') {
        //         $result = $sms->social_media_link;
        //     }
        // }
        // return $result;
        return $this->social_media_subscriptions
            ->firstWhere('social_media_type', 'facebook')?->social_media_link;
    }

    public function hasTwitter()
    {
        return $this->social_media_subscriptions
            ->firstWhere('social_media_type', 'twitter')?->social_media_link;
    }

    public function scopeWithTwitter($query)
    {
        return $query->with('social_media_subscriptions')
            ->whereHas('social_media_subscriptions', function ($q) {
                $q->where('social_media_type', 'twitter');
            })->get();
    }

    public function hasGithub()
    {
        return $this->social_media_subscriptions
            ->firstWhere('social_media_type', 'github')?->social_media_link;
    }
}
