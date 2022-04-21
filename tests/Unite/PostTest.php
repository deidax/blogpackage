<?php

namespace Deidax\BlogPackage\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Deidax\BlogPackage\Tests\TestCase;
use Deidax\BlogPackage\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  function a_post_has_a_title()
  {
    $post = Post::factory()->create(['title' => 'Fake Title']);
    $this->assertEquals('Fake Title', $post->title);
  }
}