<?php

namespace Database\Seeders;

use App\Models\PostCommentActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCommentActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostCommentActivity::factory(10)->create();
    }
}
