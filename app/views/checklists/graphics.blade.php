@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

    <div class="container container-main">

        @foreach($checklist->questions as $question)
            <div class="container container-fluid">
                <div class="row">
                    <div class="col-md-8" id="graphics-{{ $question->id }}"></div>
                    <div class="col-md-4">
                        <table class="table table-responsive table-hover question-table" data-id="{{ $question->id }}"></table>
                    </div>
                </div>
            </div>
            <hr/>
        @endforeach
    </div>

@stop

@section('script')
    {{ HTML::script('/packages/highcharts/4.0.4/js/highcharts.js') }}
    {{ HTML::script('/packages/highcharts/4.0.4/js/modules/exporting.js') }}
    @extends('templates.partials.basicPieGraphic')
    <script>

        $.ajax({
            url: "/checklists/dataGraphics/{{ $checklist->id }}",
            method: "POST",
            success: function(e) {

                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                        stops: [
                            [0, color],
                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')]
                        ]
                    };
                });

                for(i in e) {
                    var data = e[i]['data'];
                    for(d in data) {
                        if (data[d][0] !== undefined) {
                            $('.question-table[data-id='+i+']').append('<tr>\
                                                                            <td>' + data[d][0] + '</td>\
                                                                            <td>' + data[d][1] + '</td>\
                                                                            <td><input type="button" class="btn btn-primary toggle-remove" data-id="'+ data[d][2] +'" value="remover"></td>\
                                                                        </tr>');
                            data[d][0] = parseInt(data[d][0]);
                            data[d][1] = parseInt(data[d][1]);
                        }
                    }
                    basicPieGraphic.series[0].data = data;
                    basicPieGraphic.chart.renderTo = 'graphics-' + i;
                    basicPieGraphic.title.text = data['name'];
                    new Highcharts.Chart(basicPieGraphic);
                }
            }
        });

        var where = [];

        function reloadGraphics() {
            $.ajax({
                url: "/checklists/dataGraphics/{{ $checklist->id }}",
                method: "POST",
                data: {'where': where},
                success: function(e) {
                    $('.toggle-remove').prop('disabled', false);
                    for(i in e) {
                        var data = e[i]['data'];
                        for (d in data) {
                            data[d][0] = parseInt(data[d][0]);
                            data[d][1] = parseInt(data[d][1]);
                        }
                        basicPieGraphic.series[0].data = data;
                        basicPieGraphic.chart.renderTo = 'graphics-' + i;
                        basicPieGraphic.title.text = e[i]['name'];
                        new Highcharts.Chart(basicPieGraphic);
                    }
                }
            });
        }

        $(document).on('click', '.toggle-remove', function() {

            var questionId = $(this).closest('.question-table').attr('data-id');
            var alternativeId = $(this).attr('data-id');
            for(var i in where) {
                if (where[i]['alternative_question.question_id'] == questionId &&
                    where[i]['alternative_question.alternative_id'] == alternativeId) {
                    $(this).val('remover');
                    $(this).prop('disabled', true);
                    where.splice(i, 1);
                    reloadGraphics();
                    return;
                }
            }

            $(this).val('adicionar');
            $(this).prop('disabled', true);
            where.push({
                'alternative_question.question_id': questionId,
                'alternative_question.alternative_id': alternativeId
            });
            reloadGraphics();
        });

    </script>
@stop