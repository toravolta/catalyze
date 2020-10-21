<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{

    use WithFaker;
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_stores_data()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('article.store'), [
            'title' => $this->faker->words(3, true),
            'content' => $this->faker->words(10, true),
            'topic' => $this->faker->randomNumber(1),
            'slug' => $this->faker->words(1, true),
            'user_id' => $user->id
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('article.index'));
    }

    /**
     * @test
     */
    public function it_stores_data_but_using_null_value_for_title()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->from(route('article.create'))
            ->post(route('article.store'), [
                'title' => null,
                'content' => $this->faker->words(10, true),
                'topic' => $this->faker->randomNumber(1),
                'slug' => $this->faker->words(1, true),
                'user_id' => $user->id
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('article.create'));

        $response->assertSessionHasErrors('title');
    }

    /**
     * @test
     */
    public function it_stores_data_but_using_null_value_for_content()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->from(route('article.create'))
            ->post(route('article.store'), [
                'title' => $this->faker->words(3, true),
                'content' => null,
                'topic' => $this->faker->randomNumber(1),
                'slug' => $this->faker->words(1, true),
                'user_id' => $user->id
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('article.create'));

        $response->assertSessionHasErrors('content');
    }

    /**
     * @test
     */
    public function it_stores_data_but_using_long_text_for_title()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->from(route('article.create'))
            ->post(route('article.store'), [
                'title' => $this->faker->words(201, true),
                'content' => $this->faker->words(10, true),
                'topic' => $this->faker->randomNumber(1),
                'slug' => $this->faker->words(1, true),
                'user_id' => $user->id
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('article.create'));

        $response->assertSessionHasErrors('title');
    }


    /**
     * @test
     */
    public function it_update_data_but_null_on_content()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->from(route('article.edit', 4))
            ->put(route('article.update', 4), [
                'title' => $this->faker->words(201, true),
                'content' => null,
                'topic' => $this->faker->randomNumber(1),
                'slug' => $this->faker->words(1, true),
                'user_id' => $user->id
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('article.edit', 4));

        $response->assertSessionHasErrors('content');
    }

    /**
     * @test
     */
    public function it_update_data_but_null_on_title()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->from(route('article.edit', 4))
            ->put(route('article.update', 4), [
                'title' => null,
                'content' => $this->faker->words(10, true),
                'topic' => $this->faker->randomNumber(1),
                'slug' => $this->faker->words(1, true),
                'user_id' => $user->id
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('article.edit', 4));

        $response->assertSessionHasErrors('title');
    }
}
