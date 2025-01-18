<?php

namespace App\Enums;

enum PostCommentType: string
{
    case LIKE = 'like';
    case DISLIKE = 'dislike';
}
