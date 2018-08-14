<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function index() {
        //TODO - melhorar a renderizacao de tasks (agrupar elas de forma correta para a view)
        $data = array(
                        'states'=>State::orderBy('position','asc')->get(),
                        'tasks'=>Task::orderByRaw('updated_at - created_at asc')->get()
                    );

        return view('list',$data);
    }

    public function view(Request $request) {
        $data = array('state_id'=>null);

        try {
            if ($request->has('state_id')) {
                $data['task'] = new Task();
                $data['task']->state_id = $request['state_id'];
            } else {
                $data['task'] = Task::findOrFail($request['task_id']);
            }

            $response = array('success' => 1, 'message' => view('task/form', $data)->render());
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['message'] = "<p>".__('task.insertError')."</p>";
            $response['exception'] = "<p>".$e->getMessage()."</p>";
        }

        return response()
            ->json($response);
    }

    public function insert(Request $request) {
        $response = array('success'=>1,'message'=>__('task.insertSuccess'),'id'=>$request['state_id']);

        try {
            $task = new Task();

            $task = $task->create($request->all());

            $response['data'] = view('task/singleList',['task' => $task])->render();

        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['message'] = "<p>".__('task.insertError')."</p>";
            $response['exception'] = "<p>".$e->getMessage()."</p>";
        }

        return response()
            ->json($response);
    }

    public function update(Request $request) {
        $response = array('success'=>1,'message'=>"<p>".__('task.updateSuccess')."</p>",'id'=>$request['state_id'], 'task_id'=>$request['id']);

        try {
            if (!empty(trim($request['id']))) {
                $task = Task::findOrFail($request['id']);
                $task->update($request->all());
                $response['data'] = view('task/singleList',['task' => $task])->render();
            } else {
                $response['success'] = 0;
                $response['message'] = "<p>".__('task.updateError')."</p>";
            }
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['message'] = "<p>".__('task.updateError')."</p>";
            $response['exception'] = "<p>".$e->getMessage()."</p>";
        }

        return response()
            ->json($response);
    }

    public function delete(Request $request) {
        $response = array('success'=>1,'message'=>"<p>".__('task.removeSuccess')."</p>",'id'=>$request['state_id']);

        try {
            if (!empty(trim($request['id']))) {
                Task::findOrFail($request['id'])->delete();
            } else {
                $response['success'] = 0;
                $response['message'] = "<p>".__('task.removeError')."</p>";
            }
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['message'] = "<p>".__('task.removeError')."</p>";
            $response['exception'] = "<p>".$e->getMessage()."</p>";
        }

        return response()
            ->json($response);
    }


}
