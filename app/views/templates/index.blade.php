@extends('templates.default')

@section('content')

<div class="container container-main">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <br/>
        <a href="@yield('create-url')" class="btn btn-sm btn-primary">@yield('text-create-button', Lang::get('novo'))<a/>
    <br/><br/>

    <div class="panel panel-default">
        <div class="table-responsive">
            <table id="grid-data" class="table table-hover">
                <thead>
                    <tr>
                        @yield('table-content')
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>
@stop

@section('script')
    @include('templates.modal.destroy.effect')
    <script>

    $(function() {
        var grid = $("#grid-data").bootgrid({
            ajax: true,
            url: '@yield('data-url-ajax')',
            post: function() {
                return {
                    current: window.location.hash.substring(1)
                };
            },
            formatters: {
                @yield('formatters')
                "commands": function(column, row) {
                    return '<div class="list-inline">\
                                <a href="'+ '@yield('show-url')'.replace('key', row.id) + '" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-search"></span> {{ Lang::get('Exibir') }}</a>\
                                <a href="'+ '@yield('edit-url')'.replace('key', row.id) +'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-wrench"></span> {{ Lang::get('Editar') }}</a>\
                                <a class="btn btn-sm btn-danger popup-with-zoom-anim destroy-modal" data-url="'+ '@yield('destroy-url')'.replace('key', row.id) +'"\
                                    href="#destroy-dialog" data-effect="mfp-zoom-in"><span class="glyphicon glyphicon-remove"></span> {{ Lang::get('Deletar') }}</a>\
                            </div>';
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function() {
            @include('templates.modal.destroy.script')
        });
        console.log($("#grid-data").reload);
    });

    </script>
@stop