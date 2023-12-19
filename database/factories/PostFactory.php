<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory // 팩토리를 상속 받아서 사용할 수 있다.  정해진 틀로 간단하게 사용할 수 있다. 
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title' => fake()->sentence(),
      'content' => fake()->realText(),
      'user_id' => 7,


    ];
  }
}
