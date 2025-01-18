<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $email_verified_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the posts for the User
     *
     * @return HasMany<Post, $this>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the post comments for the User
     *
     * @return HasMany<PostComment, $this>
     */
    public function postComments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'user_id');
    }

    /**
     * Get the post comment activities for the User
     *
     * @return HasMany<PostCommentActivity, $this>
     */
    public function postCommentActivities(): HasMany
    {
        return $this->hasMany(PostCommentActivity::class, 'user_id');
    }

    /**
     * Get the approved posts for the User
     *
     * @return HasMany<PostComment, $this>
     */
    public function userApprovedPostComments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'approved_by');
    }
}
