<div class="container container-main">
    {{ HTML::ul($errors->all()) }}

    @if(isset($question))
        {{ Form::model($question, ['route' => ['admin.questions.update', $question->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['url' => 'admin/questions', 'class' => 'form-horizontal']) }}
    @endif

    <div class="form-group required">
        {{ Form::label('statement', Str::title(Lang::get('enunciado')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('statement', isset($question)? null : Input::old('statement'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('enunciado')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('title_id', Str::title(Lang::get('título')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('title_id', $titles, isset($question)? null : Input::old('title_id'), ['class' => 'form-control', 'required' => 'true']) }}
        </div>
    </div>

    <div class="form-group required">
        {{ Form::label('weight', Str::title(Lang::get('peso')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::text('weight', isset($question)? null : Input::old('weight'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('peso')]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('alternatives[]', Str::title(Lang::get('alternativas')), ['class' => 'control-label col-lg-2 col-sm-4']) }}
        <div class="col-lg-10 col-sm-8">
            {{ Form::select('alternatives[]', array_column(Alternative::all(['name', 'id'])->toArray(), 'name', 'id'), isset($question)? null : Input::old('alternatives[]'), ['class' => 'form-control', 'required' => 'true', 'placeholder' => Lang::get('alternativas'), 'multiple']) }}
        </div>
    </div>

    @include('templates.partials.formSubmit', ['msg' => Lang::get('Finalizar')])

    {{ Form::close() }}
</div>
</div>