<div>
    @if(empty($state->id))
        {{ Form::model($state, ['id' => 'stateSubmit', 'method' => 'PATH', 'url' => route('state.insert')]) }}
    @else
        {{ Form::open(['id' => 'stateSubmit', 'url' => route('state.update')]) }}
    @endif
    {{ Form::label('name', __('state.name'), ['class' => '']) }}
    {{ Form::text('name', $state->name, ['placeholder' => __('state.placeholderName')]) }}

    {{ Form::text('position', $state->position , ['hidden' => 'hidden']) }}

    @if(empty($state->id))
        {{ Form::submit(__('state.Update')) }}
    @else
        {{ Form::submit(__('state.Save')) }}
    @endif
</div>
