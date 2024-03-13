<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $content
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];
}
