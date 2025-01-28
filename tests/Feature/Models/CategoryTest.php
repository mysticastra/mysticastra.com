<?php

use App\Enums\CategoryStatus;
use App\Models\Category;
use App\Models\Post;

beforeEach(function () {
    $this->category = Category::factory()->hasPosts(2)->create();
});

test('to array', function () {
    expect(array_keys($this->category->toArray()))->toBe([
        'name',
        'slug',
        'description',
        'status',
        'updated_at',
        'created_at',
        'id'
    ]);
});

test('casts', function () {
    expect($this->category->status)->toBeInstanceOf(CategoryStatus::class);
});

it('check relations', function () {
    expect($this->category->posts)->toHaveCount(2)->each->toBeInstanceOf(Post::class);
});
