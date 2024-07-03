<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $companies = Company::factory()->count(3)->create();

        $companies->each(function ($company) {
            $users = User::factory()->count(5)->create();

            $users->each(function ($user) use ($company) {
                Task::factory()->count(5)->create([
                    'company_id' => $company->id,
                    'user_id' => $user->id,
                ]);
            });
        });
    }
}
