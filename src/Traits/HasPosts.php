<?php

namespace Deidax\BlogPackage\Traits;

use Deidax\BlogPackage\Models\Post;

trait HasPosts
{
  public function posts()
  {
    return $this->morphMany(Post::class, 'author');
  }
}