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

@section('title'){{ Str::title(Lang::get('Responder Checklist')) }} @stop

@section('content')
  <link rel="stylesheet" href="/views/style/print.css" type="text/css" media="print" />
<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    <div class="title panel" data-id="{{ $checklist->id }}">
        <form name="checklist<?= $checklist->id ?>" action="respondeu" method="POST">


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
            {{-- aqui man --}}

            <div class="form-group required">
                <label for="place" class="control-label col-lg-2 col-sm-4">{{ Lang::get('lugar') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <input class="form-control" required="true" placeholder="{{ Lang::get('lugar') }}" name="place" type="text" id="place"/>
                </div>
            </div>

            <div class="form-group required">
                <label for="city" class="control-label col-lg-2 col-sm-4">{{ Lang::get('cidade') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <input class="form-control" required="true" placeholder="{{ Lang::get('cidade') }}" name="city" type="text" id="city"/>
                </div>
            </div>

            <div class="form-group required">
                <label for="state" class="control-label col-lg-2 col-sm-4">{{ Lang::get('estado') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <input class="form-control" required="true" placeholder="{{ Lang::get('estado') }}" name="state" type="text" id="state"/>
                </div>
            </div>

            <div class="form-group required">
                <label for="country" class="control-label col-lg-2 col-sm-4">{{ Lang::get('país') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <input class="form-control" required="true" placeholder="{{ Lang::get('país') }}" name="country" type="text" id="country"/>
                </div>
            </div>

            Comentarios:
            <textarea class="form-control" rows="3" id = "coment"></textarea>
            <!-- <input type="text" value = "" id="coment"> -->

            <input type="submit" value = "Salvar Resposta">
            <input type="button" value = "Imprimir" onclick="window.print()" style="views/style/print.css">

        </form>
   

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&appId=647197332061835&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    </div>

    <div class="fb-share-button" data-href="{{ $_SERVER['PHP_SELF'] }}" data-layout="button"></div>
</div>

@stop
