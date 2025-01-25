<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;

beforeEach(function () {
    $this->post_category = PostCategory::factory()->create();
});

test('to array', function () {
    expect(array_keys($this->post_category->toArray()))->toBe([
        'post_id',
        'category_id',
        'updated_at',
        'created_at',
        'id'
    ]);
});

it('checks relations', function () {
    expect($this->post_category->post)->toBeInstanceOf(Post::class)
        ->and($this->post_category->category)->toBeInstanceOf(Category::class);
});

