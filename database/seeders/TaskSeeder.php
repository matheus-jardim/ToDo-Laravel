<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Minha Task de Exemplo',
            'description' => 'dhdsdsds',
            'due_date' => '2022-12-12 00:00:00',
            'user_id' => 1,
            'category_id' => 1
        ]);
    }
}
