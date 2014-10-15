@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Editar questão')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

    <div class="form-group required">
        {{ Form::label('statement', Str::title(Lang::get('enunciado')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('statement', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('enunciado')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Str::title(Lang::get('título')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('title_id', $titles, null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('weight', Str::title(Lang::get('peso')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('weight', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('peso')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('alternatives[]', Str::title(Lang::get('alternativas')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('alternatives[]', array_column(Alternative::all()->toArray(), 'name', 'id'), array_column($question->alternatives->toArray(), 'id', 'name'), ['class' => 'form-control', 'placeholder' => Lang::get('alternativas'), 'multiple']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
            {{ Form::submit(Str::title(Lang::get('editar questão')), ['class' => 'btn btn-primary']) }}
            {{ Form::reset(Str::title(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
        </div>
    </div>

    {{ Form::close() }}
</div>
@stop