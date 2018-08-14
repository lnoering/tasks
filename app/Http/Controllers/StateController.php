<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function view(Request $request) {
        $data = array('state_id'=>null);

        try {
            if ($request->has('id')) {
                $data['state'] = State::findOrFail($request['id']);
            } else {
                $data['state'] = new State();
            }

            $response = array('success' => 1, 'message' => view('state/form', $data)->render());
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['message'] = "<p>".__('task.insertError')."</p>";
            $response['exception'] = "<p>".$e->getMessage()."</p>";
        }

        return response()
            ->json($response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insert(Request $request) {
        $response = array('success'=>1,'message'=>'<p>'.__('state.insertSuccess').'</p>');

        try {
            $maxPosition = State::max('position');
            $maxPosition ++;

            $state = new State();
            $request['position'] = $maxPosition;
            //TODO - pegar o ultimo valor do (position + 1) para setar no novo state.
            $state = $state->create($request->all());
            $response['data'] = view('state/singleList',['state' => $state])->render();

        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['message'] = "<p>".__('state.insertError')."</p>";
            $response['exception'] = "<p>".$e->getMessage()."</p>";
        }

        return response()
            ->json($response);
    }

    public function update() {

    }

    public function delete() {

    }
}
