<?php

function renderTitle($titles, $layer = 3) {
    foreach($titles as $t): ?>
        <div class="panel panel-default title" data-id="{{ $t->id }}" data-layer="{{ $layer }}" style="padding: 10px; border-color: #fff">

            <div class="panel-heading clearfix">
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                        <h{{ $layer }}>{{ $t->name }}</h{{ $layer }}>
                    </div>
                </div>
            </div>

            <div class="list-group">
                <div class="questions">
                    <?php renderQuestion($t); ?>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row titles">
                        <?php renderTitle($t->children, ++$layer); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title) {
    foreach($title->questions as $q): ?>
        <div class="list-group-item question" data-id="{{ $q->id  }}">

            <div class="row form-group">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                    {{ $q->statement }}
                </div>
            </div>

            <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10">
                <div class="row alternatives btn-group" data-toggle="buttons">
                    <?php renderAlternative($q); ?>
                </div>
            </div>

            <div class="row"></div> {{-- Esta é um bug na matrix! Sem esta linha a página, por algum motivo, quebra! --}}
        </div>
    <?php endforeach;
}

function renderAlternative($question) {
    foreach($question->alternatives as $a): ?>
        <label class="btn btn-default">
            <input type="{{ TypeQuestion::findOrFail($question->typeQuestion_id)->name }}" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $a->id }}"> {{ $a->name }}
        </label>
    <?php endforeach;
}

?>

@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Responder Checklist')) }} @stop


@section('content')
<p id="breadCrumb">
            Você está em:
            <a href = "{{URL::route('home')}}" title= "Voltar a página inicial."> Página Inicial </a>
            / Responder Lista de Avaliação. 
           
            
          </p>
  <link rel="stylesheet" href="/views/style/print.css" type="text/css" media="print" />
<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    <div class="title panel" data-id="{{ $checklist->id }}">
        <form name="checklist<?= $checklist->id ?>" action="{{ URL::route('checklists.answer.store', [$checklist->id]) }}" method="POST" class="form-horizontal">

            <div class="checklist" data-id="{{ $checklist->id }}">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-form navbar-left">
                            <h3>{{ $checklist->name }}</h3>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="titles">
                        <?php renderTitle(Title::whereChecklistId($checklist->id)->whereTitleId(null)->get()); ?>
                    </div>
                </div>
            </div>

            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
            <script>
            var autocomplete;
            function initialize() {
                var input = document.getElementById('place');
                autocomplete = new google.maps.places.Autocomplete(input);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
            google .maps.event.addDomListener(window, 'click', atualizarCampos);

            $(function() {
                //$(document).on('focusout', '.place', atualizarCampos);
                //$(document).on('focusin', '.place', atualizarCampos);
                //$(document).on('focusout', '.city', atualizarCampos);
                //$(document).on('focusin', '.city', atualizarCampos);
            });
            

            function atualizarCampos()
            {

                console.log("palspf");
                //try{
                var pla = autocomplete.getPlace()['address_components'];
                document.getElementById("city").value = "";
                document.getElementById("state").value = "";
                document.getElementById("country").value = "";
                for(var i = 0; i < pla.length; ++i)
                {
                    var type = pla[i]['types'][0];

                    if (type == "administrative_area_level_2" || type == "locality")
                    {
                        document.getElementById("city").value = pla[i]['long_name'];
                    }
                    if (type == "administrative_area_level_1")
                    {
                        document.getElementById("state").value = pla[i]['long_name'];
                    }
                    if (type == "country")
                    {
                        document.getElementById("country").value = pla[i]['long_name'];
                    }
                }
                //}catch(e){}

            }

            </script>

            <div class="form-group required">
                <label for="place" class="control-label col-lg-2 col-sm-4">{{ Lang::get('lugar') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <input class="form-control place" required="true" placeholder="{{ Lang::get('lugar') }}" name="place" type="text" id="place" 
                    onchange("atualizarCampos()")>
                </div>
            </div>

            <div class="form-group required">
                <label for="city" class="control-label col-lg-2 col-sm-4">{{ Lang::get('cidade') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <input class="form-control city" required="true" placeholder="{{ Lang::get('cidade') }}" name="city" type="text" id="city"/>
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

            <div class="form-group required">
                <label for="country" class="control-label col-lg-2 col-sm-4">{{ Lang::get('comentário') }}</label>
                <div class="col-lg-10 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="{{ Lang::get('comentário') }}" name="commentary" id="commentary"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
                    {{ Form::submit(String::capitalize('Finalizar'), ['class' => 'btn btn-primary']) }}
                    {{ Form::reset(String::capitalize(Lang::get('resetar')), ['class' => 'btn btn-inverse']) }}
                    <a href="{{ URL::route('checklists.print', $checklist->id) }}" class="btn btn-default">Imprimir</a>
                    
                </div>
            </div>

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
