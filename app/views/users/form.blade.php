<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($user))
        {{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(array('url' => 'admin/users', 'class' => 'form-horizontal')) }}
    @endif

    <div class="form-group required">
       
            {{ Form::label('username', Str::title(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('username', isset($user)? null : Input::old('username'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    <div class="form-group required">
        <span class="Required FormFieldRequired" style="visibility: visible">*</span>
        {{ Form::label('email', Str::title(Lang::get('email')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
           {{ Form::email('email', isset($user)? null : Input::old('email'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('email@exemplo.com')]) }}
        </div>
    </div>

    @unless(isset($user))
        <div class="form-group required">
            <span class="Required FormFieldRequired" style="visibility: visible">*</span>
            {{ Form::label('password', Str::title(Lang::get('senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <div class="col-lg-10 col-sm-8">
                {{ Form::password('password', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('senha')]) }}
            </div>
        </div>

        <div class="form-group required">
            <span class="Required FormFieldRequired" style="visibility: visible">*</span>
            {{ Form::label('password_confirmation', Str::title(Lang::get('confirmação de senha')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
            <div class="col-lg-10 col-sm-8">
                {{ Form::password('password_confirmation', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('confirmação da senha')]) }}
            </div>
        </div>
    @endunless

    <div class="form-group">
        {{ Form::label('speciality', Str::title(Lang::get('Conte-nos sua especialidade(profissão)')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('speciality', isset($user)? null : Input::old('speciality'), ['class' => 'form-control', 'placeholder' => Lang::get('especialidade')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('is_admin', Str::title(Lang::get('é administrador?')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::checkbox('is_admin', isset($user)? null : Input::old('is_admin'), false) }}
        </div>
    </div>

    <div class="form-group">

         {{ Form::label('gender', Str::title(Lang::get('sexo')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('gender', ['f' => 'feminino', 'm' => 'masculino'], isset($user)? null : Input::old('gender'), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('biography', Str::title(Lang::get('Sobre você')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::textarea('biography', isset($user)? null : Input::old('biography'), ['class' => 'form-control', 'placeholder' => Lang::get('biografia')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('picture_url', Str::title(Lang::get('URL da imagem')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('picture_url', isset($user)? null : Input::old('picture_url'), ['class' => 'form-control', 'placeholder' => Lang::get('url da imagem')]) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Cadastrar')])

    {{ Form::close() }}

</div>