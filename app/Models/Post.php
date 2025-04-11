<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    public function postTags(): HasMany
    {
        return $this->hasMany(PostTag::class);
    }

    public function getPrimaryTagAttribute()
    {
        if (optional($this->postTags()->type('post'))->count()) {
            return $this->postTags()->type('post')->first();
        } elseif (optional($this->postTags()->type('author'))->count()) {
            return $this->postTags()->type('author')->first();
        }
    }
}
