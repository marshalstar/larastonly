<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if (isset($alternative))
        {{ Form::model($alternative, ['route' => ['admin.alternatives.update', $alternative->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'admin.alternatives.store', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', String::capitalize(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($alternative)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('typeAlternative', String::capitalize(Lang::get('tipo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('typeAlternative_id', $typeAlternatives, isset($alternative)? null : Input::old('typeAlternative_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}
</div>