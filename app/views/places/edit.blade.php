@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar place')) }} @stop

@section('content')
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($place, ['route' => ['places.update', $place->id], 'method' => 'PUT']) }}

    <div class="form-group input-group">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'input-group-addon']) }}
        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nome']) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('city_id', Str::title(Lang::get('cidade')), ['class' => 'input-group-addon']) }}
        {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group input-group">
        {{ Form::label('type_id', Str::title(Lang::get('tipo')), ['class' => 'input-group-addon']) }}
        {{ Form::select('type_id', $types, null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit(Str::title(Lang::get('editar lugar')), ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop