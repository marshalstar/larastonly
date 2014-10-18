<?php

$titleRoot = $checklist->titles()->first();

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
                        <?php renderTitle($titleRoot->children); ?>
                </div>
            </div>
            Comentarios:
            <textarea class="form-control" rows="3" id = "coment"></textarea>
            <!-- <input type="text" value = "" id="coment"> -->
            <input type="submit" value = "Salvar Resposta">
        </form>
    </div>

</div>

@stop
