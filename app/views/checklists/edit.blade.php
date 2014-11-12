<?php

function renderTitle($titles, $typeQuestions, $layer = 3) {
    foreach($titles as $t): ?>
        <div class="panel panel-default title" data-id="{{ $t->id }}" data-layer="{{ $layer }}" style="border: 10px solid #ddd;">

            <div class="panel-heading clearfix" style="background-color: #DDD;" >
                <div class="form-group">
                    <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                        <h{{ $layer }}>{{ String::capitalize(Lang::get("título")) }}</h{{ $layer }}>
                    </label>
                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">
                        <textarea class="input-title form-control" rows="2" value="{{ $t->name }}" placeholder="{{ String::capitalize(Lang::get("título")) }}"></textarea>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                        <a href="javascript:void(0)" class="btn-del-title btn"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </div>
            </div>

            <div class="list-group">
                <div class="questions">
                    <?php renderQuestion($t, $typeQuestions); ?>
                </div>
                <a href="javascript:void(0)" class="btn-new-question list-group-item"><span class="glyphicon glyphicon-plus"></span> question</a>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row titles">
                    <?php renderTitle($t->children, $typeQuestions, ++$layer); ?>
            </div>
            </div>

            <div class="panel-footer">
                <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> title</a>
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
                    <textarea class="input-question form-control" rows="2" value="{{ $q->statement }}" placeholder="{{ String::capitalize(Lang::get("questão")) }}"></textarea>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                    <a href="javascript:void(0)" class="btn-del-question btn"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </div>

            <div class="row form-group">
                <label for="title" class="col-lg-1 col-md-1 col-sm-2 col-xs-12">{{ String::capitalize(Lang::get("tipo da questão")) }}</label>
                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">
                    {{ Form::select(null, $typeQuestions, $q->typeQuestion_id, ['class' => 'form-control input-type-question']) }}
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row alternatives">
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
    foreach($question->alternatives as $a): ?>
        <div class="alternative" data-id="{{ $a->id }}">
            <ul class="nav nav-pills">
                <li><input class="input-alternative form-control" type="text" value="{{ $a->name }}" placeholder="Alternativa"/></li>
                <li>
                    <div class="form-group form-group-sm">
                        <h8>
                            <a href="javascript:void(0)" class="control-label btn-del-alternative"><span class="glyphicon glyphicon-remove"></span></a>
                        </h8>
                    </div>
                </li>
            </ul>
        </div>
    <?php endforeach;
}

?>

@extends('templates.default')

@section('title'){{ String::capitalize(Lang::get('Novo Checklist')) }} @stop

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {{--**** funcionalidade da professora (⌐■_■) ****--}}
    <input type="checkbox" class="pattern-alternatives"/> {{ Lang::get('Usar um padrão de alternativas') }}
    <div class="alternatives-default" style="display: none;">
        <a href="javascript:void(0)" class="btn-new-alternative-default">
            <span class="glyphicon glyphicon-plus"></span> Adicionar alternativa
        </a>
        <div class="row alternatives"></div>
    </div>
    {{--****  ****--}}

    <div class="checklist" data-id="{{ $checklist->id }}">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <span class="navbar-brand">checklist</span>
                </div>
                <div class="navbar-form navbar-left">
                    <input class="input-checklist form-control" type="text" value="{{ $checklist->name }}" placeholder="Checklist"/>

                </div>
            </div>
        </div>
        <div>
            <div class="titles">
                <?php renderTitle(Title::whereChecklistId($checklist->id)->whereTitleId(null)->get(), $typeQuestions); ?>
            </div>
        </div>
        <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span>title</a>
    </div>

    <div class="form-group required">
        <label for="country" class="control-label col-lg-1 col-sm-4">{{ Lang::get('comentário') }}</label>
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