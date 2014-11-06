<?php

// function renderTitle($titles)
// {
//     foreach ($titles as $t) {

//         echo $t->name . "<br/>";

//         foreach ($t->questions as $q) {
//             echo "_ _ " . $q->statement . "<br/>";

//             foreach ($q->alternatives as $a) {
//                 echo "---" . $a->type->name . " | " . $a->name . "<br/>";
//             }

//         }

//         $this->renderTitle($t->children);

//     }
// }


function renderTitle($titles) {
    foreach ($titles as $t): ?>
        <div class="media title" data-id="{{ $t->id }}">
                <h3><label><?= $t->name ?></label></h3>
            <div class="pull-left">
                |||||||||
            </div>
            <div class="media-body">

                <div class="questions">
                    <?php renderQuestion($t); ?>
                </div>
                <div class="titles">
                    <?php renderTitle($t->children); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title) {
    foreach($title->questions as $q): ?>
        <div class="media question" data-id="{{ $q->id  }}">
            <h4><label> <?= $q->statement ?> </label></h5>
            <div class="media-body">
                <div class="alternatives list-group">
                    <?php renderAlternative($q); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderAlternative($question) {
    foreach($question->alternatives as $a): ?>
        <div class="radio">
          <label>
            <input type="radio" name="<?= $question->id ?>" value="<?= $a->id ?>">
            <?= $a->name ?>
          </label>
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

            <div class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <span class="navbar-brand">checklist</span>
                    </div>
                    <div class="navbar-form navbar-left">
                        <label> {{ $checklist->name }}<label/>
                    </div>
                </div>
            </div>
            <div class="media-list">
                <div class="titles">
                        <?php renderTitle($checklist->titles); ?>
                </div>
            </div>

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
