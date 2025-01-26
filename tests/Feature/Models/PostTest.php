<?php

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

beforeEach(function () {
    $this->post = Post::factory()->hasCategories(2)->hasTags(3)->create();
});

test('to array', function () {
    expect(array_keys($this->post->toArray()))->toBe([
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'user_id',
        'status',
        'scheduled_at',
        'meta_title',
        'meta_description',
        'updated_at',
        'created_at',
        'id',
    ]);
});

test('casts', function () {
    expect($this->post->status)->toBeInstanceOf(PostStatus::class)
        ->and($this->post->scheduled_at)->toBeInstanceOf(Carbon::class);
});

it('check relations', function () {
    expect($this->post->categories)->toHaveCount(2)->each->toBeInstanceOf(Category::class)
        ->and($this->post->tags)->toHaveCount(3)->each->toBeInstanceOf(Tag::class);
});
