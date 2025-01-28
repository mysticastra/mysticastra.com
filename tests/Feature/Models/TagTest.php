<?php

use App\Models\Post;
use App\Models\Tag;

beforeEach(function () {
    $this->tag = Tag::factory()->hasPosts(2)->create();
});

test('to array', function () {
    expect(array_keys($this->tag->toArray()))->toBe([
        'name',
        'slug',
        'color',
        'description',
        'updated_at',
        'created_at',
        'id'
    ]);
});

it('check relations', function () {
    expect($this->tag->posts)->toHaveCount(2)->each->toBeInstanceOf(Post::class);
});

it('checks attribute types and formats', function () {
    expect($this->tag->name)->toBeString();
    expect($this->tag->slug)->toBeString();
    expect($this->tag->color)->toBeString();
    expect($this->tag->description)->toBeString();
});
