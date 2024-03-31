<?php

namespace Database\Factories;

use App\Models\TaskList;
use App\Models\User; // Assuming User model is in App\Models
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskListFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = TaskList::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'id' => $this->faker->unique()->randomNumber(), // Generate a unique random number as the ID
      'user_id' => User::factory(), // Generate a random user
      'tasklist_name' => $this->faker->sentence(3),
      'tasklist_description' => $this->faker->paragraph,
    ];
  }
}
