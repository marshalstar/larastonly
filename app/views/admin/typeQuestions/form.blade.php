<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / 
            <a href="{{URL::route('admin.typeQuestions.index')}}" title= "Volta a página gerenciar tipos"> Gerenciar Tipos </a>
            / Criar novo tipo.
            
          </p>
<div class="container container-main">

    {{ HTML::ul($errors->all()) }}

    @if (isset($typeQuestion))
        {{ Form::model($typeQuestion, ['route' => ['admin.typeQuestions.update', $typeQuestion->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => 'admin.typeQuestions.store', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('name', String::capitalize(Lang::get('nome')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('name', isset($typeQuestion)? null : Input::old('name'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('nome')]) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}

</div>