<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) { 
            Task::create([
                'title' => 'task'.$i,
                'body' => 'task'.$i,
                'file' => '',
                'status' => 1,
                'create_user' => mt_rand(1,2),
            ]);
        }
    }
}
