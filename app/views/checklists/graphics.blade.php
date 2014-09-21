@extends('templates.default')

@section('title'){{ Str::title(Lang::get('editar')). ' ' .$checklist->name }} @stop

@section('content')
<div class="container container-main">
    <h1>show</h1>
    <?php Kint::dump($checklist->toArray()); ?>
</div>
@stop