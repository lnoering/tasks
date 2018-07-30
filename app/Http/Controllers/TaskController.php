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
//                        'states'=>State::all(),
//                        'tasks'=>Task::all()
                        'tasks'=>Task::all()
                    );
//        $data = array('tasks'=>Task::all()->groupBy('state.position','asc'));

        return view('list',$data);
    }


    public function insert(Request $request) {
        $data = array('state_id'=>null);
        if(empty(trim($request['state_id']))) {
            //TODO - implementar create de state
            $data['state_id'] = 2;
        } else {
            $data['state_id'] = $request['state_id'];
        }
        return view('task/form',$data);
    }

    public function insertAction(Request $request) {
        $response = array('success'=>1,'message'=>__('task.insertSuccess'));

        try {
            $task = new Task();

            $documents = $task->create($request->all());

        } catch (Exception $e) {
            $response['success'] = 0;
            $response['message'] = __('task.insertError');
            $response['exception'] = $e->getMessage();
        }

        return response()
            ->json($response);
    }


    public function edit() {

    }


}
