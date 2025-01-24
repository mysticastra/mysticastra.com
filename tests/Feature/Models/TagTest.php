<?php

use App\Models\Post;
use App\Models\Tag;

beforeEach(function () {
    $this->tag = Tag::factory()->create();
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

it('checks relations', function () {
    $post = Post::factory()->create();
    $this->tag->posts()->attach($post);
    expect($this->tag->posts)->each->toBeInstanceOf(Post::class);
});

it('checks attribute types and formats', function () {
    expect($this->tag->name)->toBeString();
    expect($this->tag->slug)->toBeString();
    expect($this->tag->color)->toBeString();
    expect($this->tag->description)->toBeString();
});

it('checks if tag can be created', function () {
    $tag = Tag::factory()->create([
        'name' => 'Test Tag',
        'slug' => 'test-tag',
        'color' => '#FFFFFF',
        'description' => 'This is a test tag'
    ]);

    expect($tag->name)->toBe('Test Tag');
    expect($tag->slug)->toBe('test-tag');
    expect($tag->color)->toBe('#FFFFFF');
    expect($tag->description)->toBe('This is a test tag');
});

it('checks if tag can be updated', function () {
    $this->tag->update([
        'name' => 'Updated Tag',
        'slug' => 'updated-tag',
        'color' => '#000000',
        'description' => 'This is an updated tag'
    ]);

    expect($this->tag->name)->toBe('Updated Tag');
    expect($this->tag->slug)->toBe('updated-tag');
    expect($this->tag->color)->toBe('#000000');
    expect($this->tag->description)->toBe('This is an updated tag');
});

it('checks if tag can be deleted', function () {
    $tagId = $this->tag->id;
    $this->tag->delete();

    expect(Tag::find($tagId))->toBeNull();
});
