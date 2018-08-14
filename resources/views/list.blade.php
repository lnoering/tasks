@extends('dashboard')

@section('content')
    <div id="tasks" class="row">
        @foreach($states as $state)
            <ul id="{{$state->id}}" class="task-group card col-sm-3">
                <h1 class="task-group-name">{{$state->name}}</h1>
                {{ Form::button(__('state.remove'),['id'=>'removeState', 'data-id' => $state->id, 'data-url' => route('state.delete', ['id' => $state->id])]) }}
                <div class="task-items">
                    @foreach($tasks as $key => $task)
                        @if($task->state_id == $state->id)
                            <li data-id="{{$task->id}}" class="task">
                                <h3>{{$task->title}}</h3>
                                <p>{{$task->description}}</p>
                                {{ Form::button(__('task.remove'),['id'=>'removeTask', 'data-id' => $task->id, 'data-url' => route('task.delete')]) }}
                                {{ Form::button(__('task.edit'),['id'=>'editTask', 'data-id' => $task->id, 'data-url' => route('task.view')]) }}
                            </li>
                            @unset($tasks[$key])
                        @endif
                    @endforeach
                </div>
                {{ Form::button(__('task.more'),['id'=>'addTask', 'data-id' => $state->id, 'data-url' => route('task.view')]) }}
            </ul>
        @endforeach
        <ul class="card col-sm-3">
            <h1>{{ Form::button(__('state.more'),['id'=>'addState', 'class' => 'button', 'data-url' => route('state.view')]) }}</h1>
        </ul>
    </div>
@endsection