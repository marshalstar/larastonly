<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if (isset($state))
        {{ Form::model($state, ['route' => ['admin.states.update', $state->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'admin/states', 'class' => 'form-horizontal', 'role' => 'form']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($state)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('country_id', Str::title(Lang::get('país')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('country_id', $countries, isset($state)? null : Input::old('country_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    {{--

    {{ Form::open(['url' => 'states', 'class' => 'form-inline', 'role' => 'form']) }}

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'sr-only']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($state)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('country_id', Str::title(Lang::get('país')), ['class' => 'sr-only']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('country_id', $countries, isset($state)? null : Input::old('country_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div> --}}

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Cadastrar')])

    {{ Form::close() }}
</div>