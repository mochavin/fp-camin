<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskList;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Create users (assuming you have a UserSeeder or UserFactory)
    $users = User::factory()->count(5)->create();

    // For each user, create task lists and tasks
    foreach ($users as $user) {
      $taskLists = TaskList::factory()->count(rand(1, 3))->create([
        'user_id' => $user->id,
      ]);

      // ... (create tasks for each task list)
      foreach ($taskLists as $taskList) {
        $tasks = Task::factory()->count(rand(1, 5))->create([
          'task_list_id' => $taskList->id,
        ]);
      }
    }
  }
}
