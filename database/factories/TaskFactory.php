<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'is_completed' => $this->faker->boolean,
            'start_at' => $this->faker->dateTime,
            'expired_at' => $this->faker->dateTime,
        ];
    }
}
