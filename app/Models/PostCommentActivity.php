<?php

namespace App\Models;

use App\Enums\PostCommentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostCommentActivity extends Model
{
    /** @use HasFactory<\Database\Factories\PostCommentActivityFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['post_comment_id', 'user_id', 'type'];

    /**
     * Get the attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => PostCommentType::class,
    ];

    /**
     * Get the user that owns the post.
     * 
     * @return BelongsTo<PostComment, $this>
     */
    public function postComment(): BelongsTo
    {
        return $this->belongsTo(PostComment::class);
    }

    /**
     * Get the user that owns the post.
     * 
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
