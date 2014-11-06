
<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($title))
        {{ Form::model($title, ['route' => ['admin.titles.update', $title->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'admin.titles.store', 'class' => 'form-horizontal']) }}
    @endif

     <div class="form-group required">
        {{ Form::label('name', String::capitalize(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($title)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

     <div class="form-group">
        {{ Form::label('title_id', String::capitalize(Lang::get('título')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('title_id', $titles, isset($title)? null : Input::old('title_id'), ['class' => 'form-control']) }}
        </div>
    </div>

     <div class="form-group">
        {{ Form::label('checklist_id', String::capitalize(Lang::get('checklist')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('checklist_id', $checklists, isset($title)? null : Input::old('checklist_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}

</div>