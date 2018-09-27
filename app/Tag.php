<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $fillable = ['name'];

//    public function user(): BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
