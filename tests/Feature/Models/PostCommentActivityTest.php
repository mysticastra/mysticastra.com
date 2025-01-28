<?php

use App\Enums\PostCommentType;
use App\Models\PostComment;
use App\Models\PostCommentActivity;
use App\Models\User;

beforeEach(function () {
    $this->post_comment_activity = PostCommentActivity::factory()->create();
});

test('to array', function () {
    expect(array_keys($this->post_comment_activity->toArray()))->toBe([
        'post_comment_id',
        'user_id',
        'type',
        'updated_at',
        'created_at',
        'id'
    ]);
});

test('casts', function () {
    expect($this->post_comment_activity->type)->toBeInstanceOf(PostCommentType::class);
});

it('check relations', function () {
    expect($this->post_comment_activity->postComment)->toBeInstanceOf(PostComment::class)
        ->and($this->post_comment_activity->user)->toBeInstanceOf(User::class);
});
