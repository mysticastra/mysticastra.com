<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
    case EDITOR = 'editor';
    case USER = 'user';
}
