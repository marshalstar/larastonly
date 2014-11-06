<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($place))
        {{ Form::model($place, ['route' => ['admin.places.update', $place->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'admin.places.store', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', String::capitalize(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($place)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('city_id', String::capitalize(Lang::get('cidade')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('city_id', $cities, isset($place)? null : Input::old('city_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('tag_id', String::capitalize(Lang::get('tipo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('typePlace_id', $typePlaces, isset($place)? null : Input::old('typePlace_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}

</div>