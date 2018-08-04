@extends('dashboard')

@section('content')
    <div id="tasks" class="row">
        @foreach($states as $state)
            <ul class="task-group card col-sm-3">
                <h1 class="task-group-name">{{$state->name}}</h1>
                <div class="task-items">
                    @foreach($tasks as $key => $task)
                        @if($task->state_id == $state->id)
                            <li class="task">
                                <h3>{{$task->title}}</h3>
                                <p>{{$task->description}}</p>
                            </li>
                            @unset($tasks[$key])
                        @endif
                    @endforeach
                </div>
                {{ Form::button(__('task.more'),['id'=>'addTask', 'data-id' => $state->id, 'data-url' => URL::to('/').'/task/insert']) }}
            </ul>
        @endforeach
        <ul class="card col-sm-3">
            <h1>{{ Form::button(__('state.more'),['id'=>'addState', 'class' => 'button', 'data-url' => URL::to('/').'/state/insert']) }}</h1>
        </ul>
        <div id="app">

        </div>
    </div>
    <script type="application/javascript">
        var byId = function (id) { return document.getElementById(id);}
        Sortable.create(byId('tasks'), {
            animation: 150,
            draggable: '.task-group',
            handle: '.task-group-name'
        });

        [].forEach.call(byId('tasks').getElementsByClassName('task-items'), function (el){
            Sortable.create(el, {
                group: 'gtask',
                animation: 150
            });
        });
    </script>
@endsection