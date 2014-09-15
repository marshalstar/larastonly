@extends('templates.default')

@section('title'){{ Str::title(Str::title(Lang::get('Nova questão'))) }} @stop

@section('content')
<div class="container" style="display: block; background-color: white; padding: 10px;">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(['url' => 'questions']) }}

    <div class="form-group" "input-group">
        {{ Form::label('statement', Str::title(Lang::get('enunciado')), ['class' => 'input-group-addon']) }}
        {{ Form::text('statement', Input::old('statement'), ['class' => 'form-control', 'placeholder' => Lang::get('enunciado')]) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('is_about_assessable', Str::title(Lang::get('é sobre avaliado?')), ['class' => 'input-group-addon']) }}
        {{ Form::checkbox('is_about_assessable', Input::old('is_about_assessable'), false) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('title_id', Str::title(Lang::get('título')), ['class' => 'input-group-addon']) }}
        {{ Form::select('title_id', $titles, Input::old('title_id'), ['class' => 'form-control']) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('weight', Str::title(Lang::get('peso')), ['class' => 'input-group-addon']) }}
        {{ Form::text('weight', Input::old('weight'), ['class' => 'form-control', 'placeholder' => Lang::get('peso')]) }}
    </div>

    <div class="form-group" "input-group">
        {{ Form::label('alternatives[]', Str::title(Lang::get('alternativas')), ['class' => 'input-group-addon']) }}
        {{ Form::select('alternatives[]', array_column(Alternative::all()->toArray(), 'name', 'id'), Input::old('alternatives[]'), ['class' => 'form-control', 'placeholder' => Lang::get('alternativas'), 'multiple']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('nova questão')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop