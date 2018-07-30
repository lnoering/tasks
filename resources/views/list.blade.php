@extends('dashboard')

@section('content')
    <div>
        @foreach($states as $state)
            <ul>
                <h1>{{$state->name}}</h1>
                @foreach($tasks as $key => $task)
                    @if($task->state_id == $state->id)
                        <li>
                            <h3>{{$task->title}}</h3>
                            <p>{{$task->description}}</p>
                        </li>
                        @unset($tasks[$key])
                    @endif
                @endforeach
                {{ Form::button(__('task.more'),['id'=>'addTask', 'data-id' => $state->id, 'data-url' => URL::to('/').'/task/insert']) }}
            </ul>
        @endforeach
        {{ Form::button(__('state.more'),['id'=>'addState', 'class' => 'button', 'data-url' => URL::to('/').'/state/insert']) }}
    </div>
@endsection