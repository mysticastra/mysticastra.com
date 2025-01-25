<?php

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

beforeEach(function () {
    $this->post_tag = PostTag::factory()->create();
});

test('to array', function () {
    expect(array_keys($this->post_tag->toArray()))->toBe([
        'post_id',
        'tag_id',
        'updated_at',
        'created_at',
        'id'
    ]);
});

it('checks relations', function () {
    expect($this->post_tag->post)->toBeInstanceOf(Post::class)
        ->and($this->post_tag->tag)->toBeInstanceOf(Tag::class);
});
