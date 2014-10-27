  
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if (isset($evaluation))
        {{ Form::model($evaluation, ['route' => ['admin.evaluations.update', $evaluation->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'admin/evaluations', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('commentary', String::capitalize(Lang::get('descrição')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('commentary', isset($evaluation)? null : Input::old('commentary'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('Descrição')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('user_id', String::capitalize(Lang::get('usuário')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('user_id', $users, isset($evaluation)? null : Input::old('user_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('checklist_id', String::capitalize(Lang::get('checklist')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('checklist_id', $checklists, isset($evaluation)? null : Input::old('checklist_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}
</div>