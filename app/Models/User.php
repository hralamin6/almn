<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory;
    protected $guarded=[];
    use InteractsWithMedia;
//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this
//            ->addMediaConversion('preview')
//            ->fit(Manipulations::FIT_CROP, 300, 300)
//            ->nonQueued();
//    }
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaCollection('default')->onlyKeepLatest(1);;
        $this->addMediaConversion('thumb')->performOnCollections('main_image', 'about_image')
            ->nonQueued();
    }

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'phone', 'status', 'type', 'bio', 'address', 'facebook', 'twitter', 'instagram', 'email', 'password'
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
//        'password' => 'hashed',
    ];

    public function words()
    {
        return $this->belongsToMany(Word::class, 'word_users', 'user_id', 'word_id')->withTimestamps();
    }
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
