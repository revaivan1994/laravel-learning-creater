<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Task;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаём пользователя
        $user = User::factory()->create();
        
        // Создаём 5 категорий для пользователя
        $categories = Category::factory()->count(5)->create([
            'user_id' => $user->id,
        ]);
        
        // Создаём 10 задач с случайной категорией
        Task::factory()->count(10)->create([
            'user_id' => $user->id,
            'category_id' => fn() => $categories->random()->id,
        ]);
    }
}
