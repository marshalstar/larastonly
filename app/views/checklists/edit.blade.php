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
                    <li><a href="javascript:void(0)" class="btn-del-title"><span class="glyphicon glyphicon-remove"></span></a></li>
                </ul>
                <div class="list-group">
                    <div class="questions">
                        <?php renderQuestion($t, $types); ?>
                    </div>
                    <a href="javascript:void(0)" class="btn-new-question list-group-item"><span class="glyphicon glyphicon-plus"></span> question</a>
                </div>
                <div class="titles">
                    <?php renderTitle($t->children, $types); ?>
                </div>
                <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> title</a>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title, $types) {
    foreach($title->questions as $q): ?>
        <div class="list-group-item question" data-id="{{ $q->id  }}">
            <div class="pull-left">
                <h5 class="media-object">questão</h5>
            </div>
            <div class="media-body">
                <ul class="nav nav-pills">
                    <li><input class="form-control input-question" type="text" value="{{ $q->statement }}" placeholder="Questão"/></li>

                    <li><a href="javascript:void(0)" class="btn-del-question"><span class="glyphicon glyphicon-remove"></span></a></li>
                    <div class="form-group col-lg-1 col-md-1 col-sm-1">
                        <li><input class="input-weight form-control" type="number" value="{{ $q->weight }}" placeholder="1"/></li>
                    </div>
                </ul>
                <div class="alternatives">
                    <?php renderAlternative($q, $types); ?>
                </div>
                <a href="javascript:void(0)" class="btn-new-alternative"><span class="glyphicon glyphicon-plus"></span> alternative</a>
            </div>
        </div>
    <?php endforeach;
}

function renderAlternative($question, $types) {
    foreach($question->alternatives as $a): ?>
        <div class="alternative" data-id="{{ $a->id }}">
            <ul class="nav nav-pills">
                <li><input class="input-alternative form-control" type="text" value="{{ $a->name }}" placeholder="Alternativa"/></li>
                <li><div class="form-group form-group-sm"><h8><a href="javascript:void(0)" class="control-label btn-del-alternative"><span class="glyphicon glyphicon-remove"></span></a></h8></div></li>
                <li>{{ Form::select(null, $types, null) }}</li>
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
        <div class="media-list">
            <div class="titles">
                <?php renderTitle(Title::whereChecklistId($checklist->id)->whereTitleId(null)->get(), $types); ?>
            </div>
        </div>
        <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span>title</a>
    </div>

</div>

@stop

@section('script')
    {{-- @TODO: depois o Yuri deve por isto em um arquivo separado (vai se virar sozinho) --}}
    <script>
        $(function() {

            $(document).on('click', '.btn-new-title', function() {
                var data = {
                    name: '{{ Lang::get('título') }}',
                    checklist_id: '{{ $checklist->id }}'
                };
                var titleOrChecklist = $(this).closest('div.title');
                if (titleOrChecklist.length == 0) {
                    titleOrChecklist = $(this).closest('div.checklist');
                } else {
                    data['title_id'] = titleOrChecklist.attr('data-id');
                }
                $.ajax({
                    url: "{{ URL::route("titles.store.ajax") }}",
                    method: "POST",
                    data: data,
                    success: function(e) {
                        titleOrChecklist.children().find('.titles').first().append('<div class="media title" data-id="'+ e.id +'">\
                                                                                        <div class="pull-left">\
                                                                                            <h5 class="media-object">título</h5>\
                                                                                        </div>\
                                                                                        <div class="media-body">\
                                                                                            <ul class="nav nav-pills">\
                                                                                                <li><input class="input-title form-control" type="text" value="'+ e.name +'" placeholder="Titulo"/></li>\
                                                                                                <li><a href="javascript:void(0)" class="btn-del-title"><span class="glyphicon glyphicon-remove"></span></a></li>\
                                                                                            </ul>\
                                                                                            <div class="list-group">\
                                                                                                <div class="questions">\
                                                                                                </div>\
                                                                                                <a href="javascript:void(0)" class="btn-new-question list-group-item"><span class="glyphicon glyphicon-plus"></span> question</a>\
                                                                                            </div>\
                                                                                            <div class="titles">\
                                                                                            </div>\
                                                                                            <a href="javascript:void(0)" class="btn-new-title"><span class="glyphicon glyphicon-plus"></span> title</a>\
                                                                                        </div>\
                                                                                    </div>');
                    },
                    error: function(e) {
                        console.error(e);
                    }
                });

            });

            $(document).on('click', '.btn-new-question', function() {
                var title = $(this).closest('div.title');
                $.ajax({
                    url: "{{ URL::route("questions.store.ajax") }}",
                    method: "POST",
                    data: {
                        statement: '{{ Lang::get('questão') }}',
                        title_id: title.attr('data-id')
                    },
                    success: function(e) {
                        title.children().find('.questions').first().append('<div class="list-group-item question" data-id="'+ e.id +'">\
                                                                                <div class="pull-left">\
                                                                                    <h5 class="media-object">questão</h5>\
                                                                                </div>\
                                                                                <div class="media-body">\
                                                                                    <ul class="nav nav-pills">\
                                                                                        <li><input class="form-control input-question" type="text" value="'+ e.statement +'" placeholder="Questão"/></li>\
                                                                                        <li><a href="javascript:void(0)" class="btn-del-question"><span class="glyphicon glyphicon-remove"></span></a></li>\
                                                                                        <div class="form-group col-lg-1 col-md-1 col-sm-1">\
                                                                                            <li><input class="input-weight form-control" type="number" value="'+ e.weight +'" placeholder="1"/></li>\
                                                                                        </div>\
                                                                                    </ul>\
                                                                                    <div class="alternatives">\
                                                                                    </div>\
                                                                                    <a href="javascript:void(0)" class="btn-new-alternative"><span class="glyphicon glyphicon-plus"></span> alternative</a>\
                                                                                </div>\
                                                                            </div>');
                    },
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('click', '.btn-new-alternative', function () {
                var question = $(this).closest('div.question');
                $.ajax({
                    url: "{{ URL::route("alternatives.store.ajax") }}",
                    method: "POST",
                    data: {
                        name: '{{ Lang::get('alternativa') }}',
                        type_id: '{{ Type::query()->first(['id'])->id }}',
                        question_id: question.attr('data-id')
                    },
                    success: function(e) {
                        question.children().find('.alternatives').first().append('<div class="alternative" data-id="'+ e.id +'">\
                                                                                      <ul class="nav nav-pills">\
                                                                                          <li><input class="input-alternative form-control" type="text" value="'+ e.name +'" placeholder="Alternativa"/></li>\
                                                                                          <li><div class="form-group form-group-sm"><h8><a href="javascript:void(0)" class="control-label btn-del-alternative"><span class="glyphicon glyphicon-remove"></span></a></h8></div></li>\
                                                                                          <li>{{ Form::select(null, $types, null) }}</li>\
                                                                                      </ul>\
                                                                                  </div>');
                    },
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('click', '.btn-del-title', function () {
                var title = $(this).closest('div.title');
                $.ajax({
                    url: "{{ URL::route("titles.destroy.ajax", 'key') }}".replace('key', title.attr("data-id")),
                    method: "DELETE",
                    success: function(e) {
                        title.remove();
                    },
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('click', '.btn-del-question', function () {
                var question = $(this).closest('div.question');
                $.ajax({
                    url: "{{ URL::route("questions.destroy.ajax", 'key') }}".replace('key', question.attr("data-id")),
                    method: "DELETE",
                    success: function(e) {
                        question.remove();
                    },
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('click', '.btn-del-alternative', function () {
                var alternative = $(this).closest('div.alternative');
                $.ajax({
                    url: "{{ URL::route("alternatives.destroy.ajax", 'key') }}".replace('key', alternative.attr("data-id")),
                    method: "DELETE",
                    success: function(e) {
                        alternative.remove();
                    },
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('change', '.input-checklist', function () {
                var alternative = $(this).closest('div.checklist');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('checklists.update.ajax', 'key')  }}'.replace('key', alternative.attr('data-id')),
                    method: 'POST',
                    data: {name: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('change', '.input-title', function () {
                var title = $(this).closest('div.title');
                var input = $(this);
                console.log('sim');
                $.ajax({
                    url: '{{ URL::route('titles.update.ajax', 'key')  }}'.replace('key', title.attr('data-id')),
                    method: 'POST',
                    data: {name: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('change', '.input-question', function () {
                var question = $(this).closest('div.question');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('questions.update.ajax', 'key')  }}'.replace('key', question.attr('data-id')),
                    method: 'POST',
                    data: {statement: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('change', '.input-alternative', function () {
                var alternative = $(this).closest('div.alternative');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('alternatives.update.ajax', 'key')  }}'.replace('key', alternative.attr('data-id')),
                    method: 'POST',
                    data: {name: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

            $(document).on('change', '.input-weight', function () {
                var question = $(this).closest('div.question');
                var input = $(this);
                $.ajax({
                    url: '{{ URL::route('questions.update.ajax', 'key')  }}'.replace('key', question.attr('data-id')),
                    method: 'POST',
                    data: {weight: input.val()},
                    success: function(e) {},
                    error: function(e) {
                        console.error(e);
                    }
                });
            });

        });
    </script>
@stop
