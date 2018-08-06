<div>
    <div>
        <h4 class="title">Criar Nova Tarefa</h4>
    </div>
    @if(Request::is('/edit/'))
        {{ Form::model($task, ['id' => 'taskSubmit', 'method' => 'PATH', 'url' => route('task.update', ['id' => $task->id])]) }}
    @else
        {{ Form::open(['id' => 'taskSubmit', 'url' => route('task.add')]) }}
    @endif
    <div class="form-group">
        {{ Form::label('title', __('task.title'), ['class' => '']) }}
        {{ Form::text('title', null, ['placeholder' => __('task.placeholterTitle'),'class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', __('task.description'), ['class' => '']) }}
        {{ Form::text('description', null, ['placeholder' => __('task.placeholderDescripntion'),'class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('finished_at', __('task.finishedAt'), ['class' => '']) }}
        {{ Form::text('finished_at', null, ['placeholder' => __('task.placeholderFinishedAt'),'class' => 'form-control']) }}
        {{ Form::number('state_id', $state_id , ['hidden' => 'hidden']) }}
    </div>
    @if(Request::is('/edit/'))
        {{ Form::submit(__('task.Update'),['class' => 'btn btn-default']) }}
    @else
        {{ Form::submit(__('task.Save'),['class' => 'btn btn-default']) }}
    @endif
    {{ Form::close() }}
</div>

