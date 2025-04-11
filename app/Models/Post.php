<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
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

    public function primaryTag(): Attribute
    {
        return new Attribute(
            get: function () {
                if (optional($this->postTags->where('type', 'post'))->count()) {
                    return $this->postTags->where('type', 'post')->first();
                } elseif (optional($this->postTags->where('type', 'author'))->count()) {
                    return $this->postTags->where('type', 'author')->first();
                }
            }
        );
    }

    protected function casts(): array
    {
        return [
            'title' => AsStringable::class,
            'body' => AsStringable::class,
            'slug' => AsStringable::class,
        ];
    }

    public function getSnippetAttribute()
    {
        return $this->body
            ->stripTags()
            ->words(30, '...');
    }

    public function getUrlPathAttribute()
    {
        return $this->slug
            ->prepend('/articles/');
    }

    public function getFormattedBodyAttribute()
    {
        return $this->body
            ->markdown()
            ->replaceMatches('/\@mention\((.*?)\)/', '<a href="/users/$1">@$1</a>')
            ->replace('[[', '<mark>')
            ->replace(']]', '</mark>');
    }

    public function getSeoTitleAttribute()
    {
        return $this->title
            ->title()
            ->limit(60);
    }
}
