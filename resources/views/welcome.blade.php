<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('highcharts.js') }}"></script>
    <script src="{{ asset('exporting.js') }}"></script>
</head>
<body>
    <div id="container_humedad" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <div id="container_temperaturas" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <div id="container_presion" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <script type="text/javascript">

        async function getPresion(){
            var fechas = await fetch('{{ route("fecha_hora") }}').then(response => response.json());
            var presion = await fetch("{{ route('presion') }}").then(response => response.json());
            var array_fechas = [];
            var array_presion = [];

            await fechas.forEach((fecha)=>{
                array_fechas.push(fecha.fecha_hora)
            })

            await presion.forEach((p)=>{
                array_presion.push(p.STC)
            })

            $(function () {
                $('#container_presion').highcharts({
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
                        {   name: 'Presion',
                            data: array_presion
                        }
                    ]
                });
            });
        }

        async function getTemperatura(){
            var fechas = await fetch('{{ route("fecha_hora") }}').then(response => response.json());
            var temperaturas = await fetch("{{ route('temperatura') }}").then(response => response.json());
            var array_fechas = [];
            var array_temperaturas = [];

            await fechas.forEach((fecha)=>{
                array_fechas.push(fecha.fecha_hora)
            })

            await temperaturas.forEach((temperatura)=>{
                array_temperaturas.push(temperatura.tempC)
            })

            $(function () {
                $('#container_temperaturas').highcharts({
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
                        {   name: 'Temperatura',
                            data: array_temperaturas
                        }
                    ]
                });
            });
        }

        async function getHumedad(){
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
                $('#container_humedad').highcharts({
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

        getPresion();
        getHumedad();
        getTemperatura();
    </script>
</body>
</html>