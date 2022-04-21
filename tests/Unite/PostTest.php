<?php

namespace Deidax\BlogPackage\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Deidax\BlogPackage\Tests\TestCase;
use Deidax\BlogPackage\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostTest extends TestCase
{
  // use RefreshDatabase;
  /** @test */
  function a_post_has_a_title()
  {
    $post = Post::factory()->create(['title' => 'Fake Title']);
    $this->assertEquals('Fake Title', $post->title);
  }

  /** @test */
  function a_post_has_a_body()
  {
    $post = Post::factory()->create(['body' => 'Fake Body']);
    $this->assertEquals('Fake Body', $post->body);
  }

  /** @test */
  function a_post_has_an_author_id()
  {
    // Note that we are not assuming relations here, just that we have a column to store the 'id' of the author
    $post = Post::factory()->create(['author_id' => 999]); // we choose an off-limits value for the author_id so it is unlikely to collide with another author_id in our tests
    $this->assertEquals(999, $post->author_id);
  }
}