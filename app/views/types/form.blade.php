<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($type))
        {{ Form::model($type, ['route' => ['types.update', $type->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'types', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($type)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('novo lugar')])

    {{ Form::close() }}

</div>