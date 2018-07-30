@extends('dashboard')

@section('content')
<div>
    @if(Request::is('/edit/'))
        {{ Form::model($task, ['method' => 'PATH', 'url' => 'state/update/'.$task->id]) }}
    @else
        {{ Form::open(['url' => 'state/insertAction']) }}
    @endif
    {{ Form::label('name', __('state.name'), ['class' => '']) }}
    {{ Form::text('name', null, ['placeholder' => __('state.placeholderName')]) }}

    {{ Form::text('position', null , ['hidden' => 'hidden']) }}

    @if(Request::is('/edit/'))
        {{ Form::submit(__('task.Update')) }}
    @else
        {{ Form::submit(__('task.Save')) }}
    @endif
</div>
