<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * If all of the correct data is sent to the store method
     * we expect a new post to our database.
     * @return void
     */
    public function aNewPostCanBeAddedThroughTheForm()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/post',[
            'body' => 'This is a test post tweet'
        ]);
        $this->assertCount(1, Post::all());
    }

    /**
     * @test
     * We want to make sure that the validation of a new Post Tweet will work
     * @return void
     */
    public function bodyIsRequired()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/post',[
            'body' => ''
        ]);
        $this->assertCount(0, Post::all());
    }

    /**
     * @test
     * We want to make sure that the body required
     * is has maximum length of 140 characters
     * @return void
     */
    public function bodyAllowsMaximumOf140Characters()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/post',[
            'body' => Str::random(141)
        ]);
        $this->assertCount(0, Post::all());
    }
}
