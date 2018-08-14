<li data-id="{{$task->id}}" class="task">
    <h3>{{$task->title}}</h3>
    <p>{{$task->description}}</p>
    {{ Form::button(__('task.remove'),['id'=>'removeTask', 'data-id' => $task->id, 'data-url' => route('task.delete')]) }}
    {{ Form::button(__('task.edit'),['id'=>'editTask', 'data-id' => $task->id, 'data-url' => route('task.view')]) }}
</li>