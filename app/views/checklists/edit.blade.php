<?php

function renderTitle($titles, $typeQuestions, $layerDefault = 3) {
    foreach($titles as $t):
        $layer = $layerDefault; ?>
        <div class="panel panel-default title" data-id="{{ $t->id }}" data-layer="{{ $layer }}" style="border: 10px solid #ddd;">

            <div class="panel-heading clearfix" style="background-color: #DDD;" >
                <div class="form-group">
                    <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                        <h{{ $layer }}>{{ String::capitalize(Lang::get("título")) }}</h{{ $layer }}>
                    </label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">
                        <textarea class="input-title form-control" rows="2" value="{{ $t->name }}" placeholder="{{ String::capitalize(Lang::get("título")) }}" alt="Nome do titulo" title="Nome do titulo" >{{ $t->name }}</textarea>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                        <a href="javascript:void(0)" class="btn-del-title btn" alt="Remover titulo" title="Remover titulo"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
            </div>

            <div class="list-group">
                <div class="questions">
                    <?php renderQuestion($t, $typeQuestions); ?>
                </div>
                <a href="javascript:void(0);" class="btn-new-question list-group-item"><span class="glyphicon glyphicon-plus"></span> Adicionar Questão </a>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row titles">
                    <?php renderTitle($t->children, $typeQuestions, ++$layer); ?>
            </div>
            </div>

            <div class="panel-footer">
                <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> Adicionar Titulo </a>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title, $typeQuestions) {
    foreach($title->questions as $q): ?>
        <div class="list-group-item question" data-id="{{ $q->id  }}">

            <div class="row form-group">
                <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                    {{ String::capitalize(Lang::get("questão")) }}
                </label>
                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">
                    <textarea class="input-question form-control" rows="2" value="{{ $q->statement }}" placeholder="{{ String::capitalize(Lang::get("questão")) }}">{{ $q->statement }}</textarea>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                    <a href="jav    ascript:void(0)" class="btn-del-question btn"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>

            <div class="row form-group">
                <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">{{ String::capitalize(Lang::get("tipo da questão")) }}</label>
                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">
                    {{ Form::select(null, $typeQuestions, $q->typeQuestion_id, ['class' => 'form-control input-type-question']) }}
                </div>
            </div>

            <div>
                <div class="alternatives">
                    <?php renderAlternative($q, $typeQuestions); ?>
                </div>
            </div>

            <div class="row">
                <a href="javascript:void(0)" class="btn-new-alternative col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span class="glyphicon glyphicon-plus"></span> Adicionar alternativa
                </a>
            </div>
        </div>
    <?php endforeach;
}

function renderAlternative($question, $typeQuestions) {
    $iterator = 0;
    foreach($question->alternatives as $a): ?>
        <div class="alternative" data-id="{{ $a->id }}">
            <div class="row form-group">
                @unless($iterator++)
                    <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                        {{ String::capitalize(Lang::get("alternativa")) }}
                    </label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">
                        <input class="input-alternative form-control" type="text" value="{{ $a->name }}" placeholder="Alternativa"/>
                    </div>
                @else
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                        <input class="input-alternative form-control" type="text" value="{{ $a->name }}" placeholder="Alternativa"/>
                    </div>
                @endunless
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                    <a href="javascript:void(0)" class="control-label btn-del-alternative"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>
        </div>
    <?php endforeach;
}

?>

@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Novo Checklist')) }} @stop

@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Criar Lista de Avaliação. 
           
            
          </p>

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="checklist" data-id="{{ $checklist->id }}">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <span class="navbar-brand">Nome do Checklist</span>
                </div>
                <div class="navbar-form navbar-left">
                    <input class="input-checklist form-control" type="text" value="{{ $checklist->name }}" placeholder="Checklist"/>

                </div>
            </div>
        </div>

        {{--**** funcionalidade da professora (⌐■_■) ****--}}
        <label>
            <input type="checkbox" class="pattern-alternatives" alt="Todas as questoes com as mesmas alternativas" title="Todas as questoes com as mesmas alternativas"/> {{ Lang::get('Usar mesmas alternativas para todas as questões') }}
        </label>

        <div class="alternatives-default" style="display: none;">
            <a href="javascript:void(0)" class="btn-new-alternative-default">
                <span class="glyphicon glyphicon-plus"></span> {{ String::capitalize(Lang::get("Adicionar alternativa")) }} 
            </a>
            <div class="row alternatives"></div>
        </div>
        {{--****  ****--}}

        <div>
            <div class="titles">
                <?php renderTitle(Title::whereChecklistId($checklist->id)->whereTitleId(null)->get(), $typeQuestions); ?>
            </div>
        </div>
        <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> Adicionar Titulo</a>
    </div>

    <div class="form-group required">
        <label for="country" class="control-label col-lg-1 col-sm-4">{{ Lang::get('Comentário') }}</label>
        <div class="col-lg-11 col-sm-8">
            <textarea class="form-control input-description" rows="3" placeholder="{{ Lang::get('comentário') }}" name="commentary" id="commentary"></textarea>
        </div>
    </div>

    <a class="btn btn-default" href="{{ URL::route('checklists.answer.create', $checklist->id) }}">Finalizar</a>

</div>

@stop

@section('script')
    <script>
        var titleNameDefault = "{{ String::capitalize(Lang::get("título")) }}";
        var titleUrlStoreAjax = "{{ URL::route("titles.store.ajax") }}";
        var titleUrlDestroyAjax = "{{ URL::route("titles.destroy.ajax", "key") }}";
        var titleUrlUpdateAjax = "{{ URL::route("titles.update.ajax", "key") }}";

        var questionStatementDefault = "{{ Lang::get("questão") }}";
        var questionUrlStoreAjax = "{{ URL::route("questions.store.ajax") }}";
        var questionUrlDestroyAjax = "{{ URL::route("questions.destroy.ajax", "key") }}";
        var questionUrlUpdateAjax = "{{ URL::route("questions.update.ajax", "key") }}";

        var alternativeNameDefault = "{{ Lang::get("alternativa") }}";
        var alternativeUrlStoreAjax = "{{ URL::route("alternatives.store.ajax") }}";
        var alternativeUrlDestroyAjax = "{{ URL::route("alternatives.destroy.ajax", "key") }}";
        var alternativeUrlUpdateAjax = "{{ URL::route("alternatives.update.ajax", "key") }}";

        var typeQuestionIdDefault = "{{ TypeQuestion::first()->id }}";

        var typeQuestionNameDefault = "{{ String::capitalize(Lang::get("tipo da questão")) }}";
        var checklistId = {{ $checklist->id }};
        var checklistUrlUpdateAjax = "{{ URL::route("checklists.update.ajax", "key") }}";

        var htmlSelect = '{{ Form::select(null, $typeQuestions, null, ['class' => 'form-control input-type-question']) }}';
    </script>
    <script src="/js/checklists/edit.js" async></script>
@stop