
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if (isset($checklist))
        {{ Form::model($checklist, ['route' => ['admin.checklists.update', $checklist->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'admin/checklists', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($checklist)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('user_id', $users, isset($checklist)? null : Input::old('user_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('novo checklist')])

    {{ Form::close() }}
</div>