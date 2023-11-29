<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* Klasa typu model reprezentująca pisemne publikacje użytkowników.
*
* @property int $id
* @property int $author_id
* @property string $title
* @property string $content
*
* @property User $author
*/


class Comment extends Model
{
    use HasFactory;
}
