<ul id="{{$state->id}}" class="task-group card col-sm-3">
    <h1 class="task-group-name">{{$state->name}}</h1>
    {{ Form::button(__('state.remove'),['id'=>'removeState', 'data-id' => $state->id, 'data-url' => route('state.delete', ['id' => $state->id])]) }}
    <div class="task-items">
    </div>
    {{ Form::button(__('task.more'),['id'=>'addTask', 'data-id' => $state->id, 'data-url' => route('task.view')]) }}
</ul>