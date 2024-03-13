<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property string $real_path
 * @property int $user_id
 * @property string $file_name
 * @property string $file_type
 * @property string|int $file_size
 * @property int $year
 * @property Carbon|string $publication_date
 */
class File extends Model
{
    use HasFactory;

    protected $guarded = [];
}
