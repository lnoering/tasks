@extends('dashboard')

@section('content')
    <div class="row">
        @foreach($states as $state)
            <ul class="card col-sm-3">
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
        <ul class="card col-sm-3">
            <h1>{{ Form::button(__('state.more'),['id'=>'addState', 'class' => 'button', 'data-url' => URL::to('/').'/state/insert']) }}</h1>
        </ul>
        <div id="app">

        </div>
    </div>
    <script type="application/javascript">
        var el = document.getElementsByClassName('card');
        var sortable = Sortable.create(el);
    </script>
@endsection