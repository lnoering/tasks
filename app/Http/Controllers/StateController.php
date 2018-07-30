<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{

    public function insert() {
        return view('state/form');
    }

    public function insertAction(Request $request) {
        $response = array('success'=>1,'message'=>__('state.insertSuccess'));

        try {
            $state = new State();

            $documents = $state->create($request->all());

        } catch (Exception $e) {
            $response['success'] = 0;
            $response['message'] = __('state.insertError');
            $response['exception'] = $e->getMessage();
        }

        return response()
            ->json($response);
    }

    public function edit() {

    }
}
