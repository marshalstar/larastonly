<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($city))
        {{ Form::model($city, ['route' => ['admin.cities.update', $city->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'admin/cities', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($city)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('state_id', Str::title(Lang::get('estado/província')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('state_id', $states, isset($city)? null : Input::old('state_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('nova cidade')])

    {{ Form::close() }}

</div>