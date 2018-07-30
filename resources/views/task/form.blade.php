@extends('dashboard')

@section('content')
    <div>
        @if(Request::is('/edit/'))
            {{ Form::model($task, ['method' => 'PATH', 'url' => 'task/update/'.$task->id]) }}
        @else
            {{ Form::open(['url' => 'task/insertAction']) }}
        @endif
        {{ Form::label('title', __('task.title'), ['class' => '']) }}
        {{ Form::text('title', null, ['placeholder' => __('task.placeholterTitle')]) }}

        {{ Form::label('description', __('task.description'), ['class' => '']) }}
        {{ Form::text('description', null, ['placeholder' => __('task.placeholderDescripntion')]) }}

        {{ Form::label('finished_at', __('task.finishedAt'), ['class' => '']) }}
        {{ Form::text('finished_at', null, ['placeholder' => __('task.placeholderFinishedAt')]) }}

        {{ Form::number('state_id', $state_id , ['hidden' => 'hidden']) }}

        @if(Request::is('/edit/'))
            {{ Form::submit(__('task.Update')) }}
        @else
            {{ Form::submit(__('task.Save')) }}
        @endif
    </div>
@endsection

