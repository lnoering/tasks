<div>
    <div>
        <h4 class="title">Criar Nova Tarefa</h4>
    </div>
    @if(empty($task->id))
        {{ Form::open(['id' => 'taskSubmit', 'url' => route('task.add')]) }}
    @else
        {{ Form::model($task, ['id' => 'taskSubmit', 'method' => 'PATH', 'url' => route('task.update', ['id' => $task->id])]) }}
    @endif
    <div class="form-group">
        {{ Form::label('title', __('task.title'), ['class' => '']) }}
        {{ Form::text('title', $task->title, ['placeholder' => __('task.placeholterTitle'),'class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', __('task.description'), ['class' => '']) }}
        {{ Form::text('description', $task->description, ['placeholder' => __('task.placeholderDescripntion'),'class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('finished_at', __('task.finishedAt'), ['class' => '']) }}
        {{ Form::text('finished_at', $task->finished_at, ['placeholder' => __('task.placeholderFinishedAt'),'class' => 'form-control']) }}
        {{ Form::number('state_id', $task->state_id , ['hidden' => 'hidden']) }}
    </div>
    @if(empty($task->id))
        {{ Form::submit(__('task.Save'),['class' => 'btn btn-default']) }}
    @else
        {{ Form::number('id', $task->id , ['hidden' => 'hidden']) }}
        {{ Form::submit(__('task.Update'),['class' => 'btn btn-default']) }}
    @endif
    {{ Form::close() }}
</div>

