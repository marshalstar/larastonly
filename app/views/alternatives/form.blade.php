<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if (isset($alternative))
        {{ Form::model($alternative, ['route' => ['admin.alternatives.update', $alternative->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'admin/alternatives', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($alternative)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('type', Str::title(Lang::get('tipo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('type_id', $types, isset($alternative)? null : Input::old('type_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('nova alternativa')])

    {{ Form::close() }}
</div>