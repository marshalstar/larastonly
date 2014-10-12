@extends('templates.default')

@section('title'){{ Str::title(Lang::get('Novo Checklist')) }} @stop

@section('content')

    <div class="container container-main">
        <h4>É nois que voa Santos Dumont</h4>
        <h4>É Nois que é a lenda Will Smith</h4>
        <h4>É nóis que toma café Pelé</h4>

        <div id="graphics"></div>

    </div>

@stop

@section('script')
    {{ HTML::script('/packages/highcharts/4.0.4/js/highcharts.js') }}
    <script>
//        $(document).ready(function() {
//            var options = {
//                chart: {
//                    renderTo: 'graphics',
//                    plotBackgroundColor: null,
//                    plotBorderWidth: null,
//                    plotShadow: false
//                },
//                title: {
//                    text: 'Web Sales & Marketing Efforts'
//                },
//                tooltip: {
//                    formatter: function() {
//                        return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
//                    }
//                },
//                plotOptions: {
//                    pie: {
//                        allowPointSelect: true,
//                        cursor: 'pointer',
//                        dataLabels: {
//                            enabled: true,
//                            color: '#000000',
//                            connectorColor: '#000000',
//                            formatter: function() {
//                                return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
//                            }
//                        }
//                    }
//                },
//                series: [{
//                    type: 'pie',
//                    name: 'Browser share',
//                    data: []
//                }]
//            }
//
//            $.getJSON("/checklists/dataGraphics/2/3", function(json) {
//                options.series[0].data = json;
//                chart = new Highcharts.Chart(options);
//            });
//
//
//
//        });
          $(document).ready(function() {

            var optionsDefault = {
                chart: {
                    renderTo: '#',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: '#'
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: []
                }]
            };

            $.getJSON("/checklists/dataGraphics/2/3", function(json) {
                optionsDefault.series[0].data = json;
                optionsDefault.chart.renderTo = 'graphics';
                optionsDefault.title.text = 'título';
                chart = new Highcharts.Chart(optionsDefault);
            });




          });
    </script>
@stop