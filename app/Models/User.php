<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // ...

    public function publications()
    {
        return $this->hasMany(Publication::class, 'author_id');
    }
}
