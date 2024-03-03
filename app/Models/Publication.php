<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $content
 * @property int $author_id
 *
 * @property-read User $author
 */


class Publication extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->withTrashed();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'publication_id');
    }
}



