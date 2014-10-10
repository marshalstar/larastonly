@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="panel panel-default">
        <a href="javascript:void(0)" class="btn btn-default btn-new-title">novo title</a>
        <div class="titles"></div>
    </div>

</div>

@stop

@section('script')
    <script>
        $(function() {

            $(document).on('click', '.btn-new-title', function() {
                $(this).parent().children('.titles').append("<div style='padding: 20px;border:1px solid #f9f2f4;'>\
                                                                  <a href='javascript:void(0)' class='btn btn-default btn-new-title'>novo title</a>\
                                                                  <a href='javascript:void(0)' class='btn btn-default btn-new-question'>nova question</a>\
                                                                  <input type='text'>\
                                                                  <div class='questions'></div>\
                                                                  <div class='titles'></div>\
                                                              </div>");
            });

            $(document).on('click', '.btn-new-question', function() {
                $(this).parent().children('.questions').append("<div style='padding: 20px;border:1px solid #f9f2f4;'>\
                                                                    <a href='javascript:void(0)' class='btn btn-default btn-new-alternative'>nova alternative</a>\
                                                                    <input type='text'>\
                                                                    <div class='alternatives'></div>\
                                                                </div>");
            });

            $(document).on('click', '.btn-new-alternative', function () {
                $(this).parent().children('.alternatives').append("<div style='padding: 20px;border:1px solid #f9f2f4;'>\
                                                                       <select>\
                                                                           <option value='ok'>Ok</option>\
                                                                           <option value='okO'>ok0</option>\
                                                                           <option value='ok1'>ok1</option>\
                                                                       </select>\
                                                                       <input type='text'>\
                                                                   </div>");
            });

        });
    </script>
@stop