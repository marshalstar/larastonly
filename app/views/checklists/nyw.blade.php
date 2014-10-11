<?php

function renderTitle($title, $types) {
    foreach($title->children as $t): ?>
        <div style="padding: 20px;border:1px solid #e7e7e7;" data-id="{{ $t->id }}">
            <a href="javascript:void(0)" class="btn btn-default btn-new-title">novo title</a>
            <a href="javascript:void(0)" class="btn btn-default btn-new-question">nova question</a>
            <input type="text" value="{{ Lang::get('título') }}">
            <div class="questions">
                <?php renderQuestion($t, $types); ?>
            </div>
            <div class="titles">
                <?php renderTitle($t, $types); ?>
            </div>
        </div>
    <?php endforeach;
}

function renderQuestion($title, $types) {
    foreach($title->questions as $q): ?>
        <div style="padding: 20px;border:1px solid #e7e7e7;" data-id="{{ $q->id  }}">
            <a href="javascript:void(0)" class="btn btn-default btn-new-alternative">nova alternative</a>
            <input type="text" value="{{ Lang::get('questão')  }}">
            <div class="alternatives">
                <?php renderAlternative($q, $types); ?>
            </div>
        </div>
    <?php endforeach;
}

function renderAlternative($question, $types) {
    foreach($question->alternatives as $a): ?>
        <div style="padding: 20px;border:1px solid #e7e7e7;" data-id="{{ $a->id }}">
            {{ Form::select(null, $types, null) }}
            <input type="text" value="{{ Lang::get('alternativa')  }}">
        </div>
    <?php endforeach;
}

?>

@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="panel">
        <input type="text" value="{{ $checklist->name }}">
    </div>

    <div class="panel" data-id="{{ $titleRoot->id }}">
        <a href="javascript:void(0)" class="btn btn-default btn-new-title">novo title</a>
        <div class="titles">
            <?php renderTitle($titleRoot, $types); ?>
        </div>
    </div>

</div>

@stop

@section('script')
    <script>
        $(function() {

            $(document).on('click', '.btn-new-title', function() {
                var title = $(this).parent();
                $.ajax({
                    url: "{{ URL::route("titles.storeAjax") }}",
                    method: "POST",
                    data: {
                        name: '{{ Lang::get('título') }}',
                        checklist_id: '{{ $checklist->id }}',
                        title_id: title.attr('data-id')
                    },
                    success: function(e) {
                        title.children('.titles').append('<div style="padding: 20px;border:1px solid #e7e7e7;" data-id="'+ e.id +'">\
                                                              <a href="javascript:void(0)" class="btn btn-default btn-new-title">novo title</a>\
                                                              <a href="javascript:void(0)" class="btn btn-default btn-new-question">nova question</a>\
                                                              <input type="text" value="{{ Lang::get('título') }}">\
                                                              <div class="questions"></div>\
                                                              <div class="titles"></div>\
                                                          </div>');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });

            });

            $(document).on('click', '.btn-new-question', function() {
                var title = $(this).parent();
                $.ajax({
                    url: "{{ URL::route("questions.storeAjax") }}",
                    method: "POST",
                    data: {
                        statement: '{{ Lang::get('questão') }}',
                        title_id: title.attr('data-id')
                    },
                    success: function(e) {
                        title.children('.questions').append('<div style="padding: 20px;border:1px solid #e7e7e7;" data-id="'+ e.id +'">\
                                                                 <a href="javascript:void(0)" class="btn btn-default btn-new-alternative">nova alternative</a>\
                                                                 <input type="text" value="{{ Lang::get('questão')  }}">\
                                                                 <div class="alternatives"></div>\
                                                             </div>');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

            $(document).on('click', '.btn-new-alternative', function () {
                var question = $(this).parent();
                $.ajax({
                    url: "{{ URL::route("alternatives.storeAjax") }}",
                    method: "POST",
                    data: {
                        name: '{{ Lang::get('alternativa') }}',
                        type_id: '{{ Type::query()->first(['id'])->id }}',
                        question_id: question.attr('data-id')
                    },
                    success: function(e) {
                        question.children('.alternatives').append('<div style="padding: 20px;border:1px solid #e7e7e7;" data-id="'+ e.id +'">\
                                                                      {{ Form::select(null, $types, null) }}\
                                                                      <input type="text" value="{{ Lang::get('alternativa')  }}">\
                                                                   </div>');
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });

        });
    </script>
@stop