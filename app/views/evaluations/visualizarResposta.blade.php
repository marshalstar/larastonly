<?php
function renderTitle($titles, $e) {
                        // <?php die ? >
                        // die;
    foreach ($titles as $t): ?>
        <div class="media title" data-id="{{ $t->id }}">
                <h3><label><?= $t->name ?></label></h3>
            <div class="pull-left">
                |||||||||
            </div>
            <div class="media-body">

                <div class="questions">
                    <?php renderQuestion($t, $e); ?>
                </div>
                <div class="titles">
                    <?php renderTitle($t->children, $e); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title, $evaluation) {
    foreach($title->questions as $q): ?>
        <div class="media question" data-id="{{ $q->id  }}">
            <h4><label> <?= $q->statement ?> </label></h5>
            <div class="media-body">
                <div class="alternatives list-group">
                    <?php renderAlternative($q, $evaluation); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderAlternative($question, $evaluation) {
    $an = $evaluation->answers;
    foreach($an as $a){
        // break;
         if($a->alternativeQuestion->question_id == $question->id)
        {
            echo $a->alternativeQuestion->alternative->name;;        
        }
    }
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


    <div class="title panel" >
<?php $checklist = Checklist::find($evaluation->checklist_id); ?>
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <!-- <div class="navbar-header">
                </div> -->
                <div class="navbar-header">
                    <span class="navbar-brand">{{ $checklist->name }}:</span> 
                    <span class="navbar-brand"><?php $p = Place::find($evaluation->place_id); echo $p->name.'; '?></span>
                    <span class="navbar-brand"><?= $p->city->name.', '.$p->city->state->name.', '.$p->city->state->country->name ?> </span>
                </div>
            </div>
        </div>
        <div class="media-list">
            <div class="titles">
                    <?php renderTitle($checklist->titles, $evaluation); ?>
            </div>
        </div>

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
