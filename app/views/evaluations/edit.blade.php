@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar avaliação')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}

    <div class="form-group required">
        {{ Form::label('commentary', Str::title(Lang::get('comentário')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('commentary', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('comentário')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('checklist_id', Str::title(Lang::get('checklist')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('checklist_id', $checklists, null, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
            {{ Form::submit(Str::title(Lang::get('editar avaliação')), ['class' => 'btn btn-primary']) }}
            {{ Form::reset(Str::title(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
        </div>
    </div>

    {{ Form::close() }}
</div>
@stop