<?php

namespace Deidax\BlogPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded  = [];

    protected static function newFactory()
    {
        return \Deidax\BlogPackage\Database\Factories\PostFactory::new();
    }  

    public function author()
    {
        return $this->morphTo();
    }
}
