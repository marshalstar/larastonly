   <p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('evaluations.index')}}" title= "Volta a página gerenciar avaliação."> Gerenciar Avaliação. </a>
            / Criar nova avaliação.
            
          </p>
<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if (isset($evaluation))
        {{ Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'evaluations', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('commentary', Str::title(Lang::get('descrição')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('commentary', isset($evaluation)? null : Input::old('commentary'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('Descrição')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('user_id', Str::title(Lang::get('usuário')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('user_id', $users, isset($evaluation)? null : Input::old('user_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('checklist_id', Str::title(Lang::get('checklist')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('checklist_id', $checklists, isset($evaluation)? null : Input::old('checklist_id'), ['class' => 'form-control']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('nova avaliação')])

    {{ Form::close() }}
</div>