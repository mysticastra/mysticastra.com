<?php

namespace App\Models;

use App\Enums\PostCommentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $post_comment_id
 * @property int $user_id
 * @property PostCommentType $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
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
     * Get the post comment.
     * 
     * @return BelongsTo<PostComment, $this>
     */
    public function postComment(): BelongsTo
    {
        return $this->belongsTo(PostComment::class);
    }

    /**
     * Get the user that owns the post comment activity.
     * 
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
