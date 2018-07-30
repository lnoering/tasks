<?php

use Illuminate\Database\Seeder;
use App\State;
use App\Task;

class TaskAndSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = array(
            [
                'title' => 'First',
                'description' => 'Primeira task',
                'state_id' => 1,
            ],
            [
                'title' => 'Second',
                'description' => 'Segunda task',
                'state_id' => 1,
            ],
            [
                'title' => 'Third',
                'description' => 'Terceira task',
                'state_id' => 2,
            ],
        );

        $states = array(
            [
                'name' => 'Backlog',
                'position' => 1,
            ],
            [
                'name' => 'To Do',
                'position' => 2,
            ],
            [
                'name' => 'Finished',
                'position' => 3,
            ],
        );

        foreach ($states as $key => $value) {
            State::create($value);
        }

        foreach ($tasks as $key => $value) {
            Task::create($value);
        }
    }
}
