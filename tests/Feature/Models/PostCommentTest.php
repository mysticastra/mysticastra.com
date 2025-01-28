<?php

use Illuminate\Support\Carbon;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;

beforeEach(function () {
    $this->post_comment = PostComment::factory()->hasReplies(4)->create();
});

test('to array', function () {
    expect(array_keys($this->post_comment->toArray()))->toBe([
        'post_id',
        'user_id',
        'content',
        'is_approved',
        'approved_at',
        'approved_by',
        'parent_id',
        'updated_at',
        'created_at',
        'id'
    ]);
});

test('casts', function () {
    expect($this->post_comment->approved_at)->toBeInstanceOf(Carbon::class)
        ->and($this->post_comment->is_approved)->toBeBool();
});

it('check relations', function () {
    expect($this->post_comment->post)->toBeInstanceOf(Post::class)
        ->and($this->post_comment->user)->toBeInstanceOf(User::class)
        ->and($this->post_comment->parent)->toBeNull()
        ->and($this->post_comment->replies)->toHaveCount(4)->each->toBeInstanceOf(PostComment::class)
        ->and($this->post_comment->approvedBy)->toBeInstanceOf(User::class);
});
