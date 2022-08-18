@section('humedad')

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script type="text/javascript">

    async function getFechas(){
        var fechas = await fetch('{{ route("fecha_hora") }}').then(response => response.json());
        var humedades = await fetch("{{ route('humedad') }}").then(response => response.json());
        var array_fechas = [];
        var array_humedades = [];

        await fechas.forEach((fecha)=>{
            array_fechas.push(fecha.fecha_hora)
        })

        await humedades.forEach((humedad)=>{
            array_humedades.push(humedad.humedad)
        })
        
        $(function () {
        $('#container').highcharts({
            title: {
                text: 'Reporte Temperatura, Humedad, Gas LP y Distancia (cm) con Arduino',
                x: -20 //center
            },
            subtitle: {
                text: 'ITTol Microcontroladores',
                x: -20
            },
            xAxis: {
                categories: array_fechas
            },
            yAxis: {
                title: {
                    text: 'Valores del Arduino'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Arduino'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
            {   name: 'Humedad',
                data: array_humedades
            }
            ]
        });
});
    }

    getFechas();
        </script>

@endsection