@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Responder Checklist')) }} @stop

@section('content')

<div class="container container-main">

  <p>{{ $checklist }}</p>

---------------------------------------------

  <?php foreach ($titulos as $key => $value) { ?>
    
  <p> {{$value}} </p>

  <?php } ?>

---------------------------------------------

  <?php foreach ($questoes as $key => $values) { ?>

    <?php foreach ($values as $key => $value) { ?>
      
    <p> {{$value}} </p>

    <?php } ?>

  <?php } ?>

</div>

@stop


