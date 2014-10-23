<?php

function renderTitle($titles, $types) {
    foreach($titles as $t): ?>
        <div class="media title" data-id="{{ $t->id }}">
            <div class="pull-left">
                <h5 class="media-object">título</h5>
            </div>
            <div class="media-body">
                <ul class="nav nav-pills">
                    <li><input class="input-title form-control" type="text" value="{{ $t->name }}" placeholder="Titulo"/></li>
                    <li><a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> novo title</a></li>
                    <li><a href="javascript:void(0)" class="btn-new-question"><span class="glyphicon glyphicon-plus"></span> nova question</a></li>
                    <li><a href="javascript:void(0)" class="btn-del-title"><span class="glyphicon glyphicon-remove"></span> destroy title</a></li>
                </ul>
                <div class="questions">
                    <?php renderQuestion($t, $types); ?>
                </div>
                <div class="titles">
                    <?php renderTitle($t->children, $types); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title, $types) {
    foreach($title->questions as $q): ?>
        <div class="media question" data-id="{{ $q->id  }}">
            <div class="pull-left">
                <h5 class="media-object">questão</h5>
            </div>
            <div class="media-body">
                <ul class="nav nav-pills">
                    <li><input class="form-control input-question" type="text" value="{{ $q->statement }}" placeholder="Questão"/></li>
                    <li><a href="javascript:void(0)" class="btn-new-alternative"><span class="glyphicon glyphicon-plus"></span> nova alternative</a></li>
                    <li><a href="javascript:void(0)" class="btn-del-question"><span class="glyphicon glyphicon-remove"></span> destroy question</a></li>
                    <li><input class="input-weight form-control" type="number" value="{{ $q->weight }}" placeholder="1"/></li>
                </ul>
                <div class="alternatives list-group">
                    <?php renderAlternative($q, $types); ?>
                </div>
            </div>
        </div>
    <?php endforeach;
}

function renderAlternative($question, $types) {
    foreach($question->alternatives as $a): ?>
        <div class="list-group-item alternative" data-id="{{ $a->id }}">
            <ul class="nav nav-pills">
                <li><input class="input-alternative form-control" type="text" value="{{ $a->name }}" placeholder="Alternativa"/></li>
                <li><div class="form-group form-group-sm"><h8><a href="javascript:void(0)" class="control-label btn-del-alternative">destroy alternative</a></h8></div></li>
                <li>{{ Form::select(null, $types, null) }}</li>
            </ul>
        </div>
    <?php endforeach;
}

?>

@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

<style>
    .question {
        border-left: 1px solid #010101;
        padding-left: 5px;
    }
</style>

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="title panel" data-id="{{ $titleRoot->id }}">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <span class="navbar-brand">checklist</span>
                </div>
                <div class="navbar-form navbar-left">
                    <input class="form-control" type="text" value="{{ $checklist->name }}" placeholder="Checklist"/>
                    <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> novo title</a>
                </div>
            </div>
        </div>
        <div class="media-list">
            <div class="titles">
                <?php renderTitle($titleRoot->children, $types); ?>
            </div>
        </div>
    </div>

</div>

@stop

@section('script')
    {{-- @TODO: depois o Yuri deve por isto em um arquivo separado (vai se virar sozinho) --}}
    <script>
        $(function() {

            $(document).on('click', '.btn-new-title', function() {
                var title = $(this).closest('div.title');
                $.ajax({
                    url: "{{ URL::route("titles.storeAjax") }}",
                    method: "POST",
                    data: {
                        name: '{{ Lang::get('título') }}',
                        checklist_id: '{{ $checklist->id }}',
                        title_id: title.attr('data-id')
                    },
                    success: function(e) {
                        title.children().find('.titles').first().append('<div class="media title" data-id="'+ e.id +'">\
                                                                             <div class="pull-left">\
                                                                                 <h5 class="media-object">título</h5>\
                                                                             </div>\
                                                                             <div class="media-body">\
                                                                                 <ul class="nav nav-pills">\
                                                                                     <li><input class="input-title form-control" type="text" value="'+ e.name +'" placeholder="Titulo"/></li>\
                                                                                     <li><a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> novo title</a></li>\
                                                                                     <li><a href="javascript:void(0)" class="btn-new-question"><span class="glyphicon glyphicon-plus"></span> nova question</a></li>\
                                                                                     <li><a href="javascript:void(0)" class="btn-del-title"><span class="glyphicon glyphicon-remove"></span> destroy title</a></li>\
                                                                                 </ul>\
                                                                                 <div class="questions"></div>\
                                                                                 <div class="titles"></div>\
                                                                             </div>\
                                                                         </div>');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });

            });

            $(document).on('click', '.btn-new-question', function() {
                var title = $(this).closest('div.title');
                $.ajax({
                    url: "{{ URL::route("questions.storeAjax") }}",
                    method: "POST",
                    data: {
                        statement: '{{ Lang::get('questão') }}',
                        title_id: title.attr('data-id')
                    },
                    success: function(e) {
                        title.children().find('.questions').first().append('<div class="media question" data-id="'+ e.id +'">\
                                                                                <div class="pull-left">\
                                                                                    <h5 class="media-object">questão</h5>\
                                                                                </div>\
                                                                                <div class="media-body">\
                                                                                    <ul class="nav nav-pills">\
                                                                                        <li><input class="form-control input-question" type="text" value="'+ e.statement +'" placeholder="Questão"/></li>\
                                                                                        <li><a href="javascript:void(0)" class="btn-new-alternative"><span class="glyphicon glyphicon-plus"></span> nova alternative</a></li>\
                                                                                        <li><a href="javascript:void(0)" class="btn-del-question"><span class="glyphicon glyphicon-remove"></span> destroy question</a></li>\
                                                                                        <li><input class="input-weight form-control" type="number" value="'+ e.weight +'" placeholder="1"/></li>\
                                                                                    </ul>\
                                                                                    <div class="alternatives list-group"></div>\
                                                                                </div>\
                                                                            </div>');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('click', '.btn-new-alternative', function () {
                var question = $(this).closest('div.question');
                $.ajax({
                    url: "{{ URL::route("alternatives.storeAjax") }}",
                    method: "POST",
                    data: {
                        name: '{{ Lang::get('alternativa') }}',
                        type_id: '{{ Type::query()->first(['id'])->id }}',
                        question_id: question.attr('data-id')
                    },
                    success: function(e) {
                        question.children().find('.alternatives').first().append('<div class="list-group-item alternative" data-id="'+ e.id +'">\
                                                                                      <ul class="nav nav-pills">\
                                                                                          <li><input class="input-alternative form-control" type="text" value="'+ e.name +'" placeholder="Alternativa"/></li>\
                                                                                          <li><div class="form-group form-group-sm"><h8><a href="javascript:void(0)" class="control-label btn-del-alternative">destroy alternative</a></h8></div></li>\
                                                                                          <li>{{ Form::select(null, $types, null) }}</li>\
                                                                                      </ul>\
                                                                                  </div>');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('click', '.btn-del-title', function () {
                var title = $(this).closest('div.title');
                $.ajax({
                    url: "{{ URL::route("titles.destroyCascadeAjax", 'key') }}".replace('key', title.attr("data-id")),
                    method: "DELETE",
                    success: function(e) {
                        title.remove();
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('click', '.btn-del-question', function () {
                var question = $(this).closest('div.question');
                $.ajax({
                    url: "{{ URL::route("questions.destroy", 'key') }}".replace('key', question.attr("data-id")),
                    method: "DELETE",
                    success: function(e) {
                        question.remove();
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('click', '.btn-del-alternative', function () {
                var alternative = $(this).closest('div.alternative');
                $.ajax({
                    url: "{{ URL::route("alternatives.destroy", 'key') }}".replace('key', alternative.attr("data-id")),
                    method: "DELETE",
                    success: function(e) {
                        alternative.remove();
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('change', '.input-title', function () {
                var title = $(this).closest('div.title');
                var input = $(this);
                console.log('sim');
                $.ajax({
                    url: '{{ URL::route('titles.updateAjax', 'key')  }}'.replace('key', title.attr('data-id')),
                    method: 'POST',
                    data: {name: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('change', '.input-question', function () {
                var question = $(this).closest('div.question');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('questions.updateAjax', 'key')  }}'.replace('key', question.attr('data-id')),
                    method: 'POST',
                    data: {statement: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('change', '.input-alternative', function () {
                var alternative = $(this).closest('div.alternative');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('alternatives.updateAjax', 'key')  }}'.replace('key', alternative.attr('data-id')),
                    method: 'POST',
                    data: {name: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('change', '.input-weight', function () {
                var question = $(this).closest('div.question');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('questions.updateAjax', 'key')  }}'.replace('key', question.attr('data-id')),
                    method: 'POST',
                    data: {weight: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

        });
    </script>
@stop
