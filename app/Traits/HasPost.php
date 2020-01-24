<?php

namespace App\Traits;

use App\Domains\Newsfeeds\Models\Post;

Trait HasPost
{
    public function postedBy()
    {
        return $this->morphMany(Post::class, 'fromable');
    }

    public function postedTo()
    {
        return $this->morphMany(Post::class, 'toable');
    }
}
