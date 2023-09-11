<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_user_can_create_a_post()
    {
        $this->withoutExceptionHandling();
        $title = 'El Titulo del Post';
        $excerpt = "Extracto de post";
        $this->createPermission('posts.store');
        $this->createPermission('posts.show');

        $this->actingAs($this->adminUser())
            ->post(route('posts.store'),[
                'title' => $title,
                'excerpt' => $excerpt
            ]);
        $this->assertDatabaseHas('posts',[
            'title' => $title,
            'excerpt' => $excerpt,
           // 'slug' => 'el-titulo-del-post',
        ]);
    }
}
