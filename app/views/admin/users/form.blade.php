<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($user))
        {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(array('route' => 'admin.users.store', 'class' => 'form-horizontal')) }}
    @endif

    <div class="form-group required">
       
            {{ Form::label('username', String::capitalize(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('username', isset($user)? null : Input::old('username'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        {{ Form::label('email', String::capitalize(Lang::get('email')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
           {{ Form::email('email', isset($user)? null : Input::old('email'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('email@exemplo.com')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('speciality', String::capitalize(Lang::get('Conte-nos sua especialidade')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('speciality', isset($user)? null : Input::old('speciality'), ['class' => 'form-control', 'placeholder' => Lang::get('especialidade')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('is_admin', String::capitalize(Lang::get('É administrador?')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::checkbox('is_admin', isset($user)? null : Input::old('is_admin'), false) }}
        </div>
    </div>

    <div class="form-group">

         {{ Form::label('gender', String::capitalize(Lang::get('Sexo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('gender', ['f' => 'feminino', 'm' => 'masculino'], isset($user)? null : Input::old('gender'), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('biography', String::capitalize(Lang::get('Biografia')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::textarea('biography', isset($user)? null : Input::old('biography'), ['class' => 'form-control', 'placeholder' => Lang::get('biografia')]) }}
        </div>
    </div>


    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}

</div>