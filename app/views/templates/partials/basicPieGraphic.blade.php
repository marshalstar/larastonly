<script>
    var basicPieGraphic = {
        chart: {
            renderTo: '',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: ''
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
                    enabled: false
                },
                {{-- dataLabels: {
                    enabled: false,
                    color: '#000000',
                    connectorColor: '#000000',
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';
                    }
                }, --}}
                {{-- showInLegend: true --}}
                showInLegend: false
            }
        },
        {{-- legend: {
            title: {
                text: 'Legenda <span style="font-size: 9px; color: #666; font-weight: normal">(Clique para esconder)</span>',
                style: {
                    fontStyle: 'italic'
                },
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                shadow: true
            }
        }, --}}
        series: [{
            type: 'pie',
            name: 'as',
            data: []
        }]
    };
</script>