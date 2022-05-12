@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center" id="title-tds"></h3>
                </div>
                <div class="card-body text-center">
                    <canvas id="gauge-tds"></canvas>
                    <div class="table-container">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nilai TDS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tds as $t)
                                    <tr>
                                        <td>{{ $t->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center" id="title-ph"></h3>
                </div>
                <div class="card-body text-center">
                    <canvas id="gauge-ph"></canvas>
                    <div class="table-container">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nilai PH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ph as $p)
                                    <tr>
                                        <td>{{ $p->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-script')
    <script src="https://bernii.github.io/gauge.js/dist/gauge.min.js"></script>
    <script>
        var topicPub = "hidroponik_polindra_aksi"
        var topicSub = "hidroponik_polindra_data"

        client = new Paho.MQTT.Client("broker.hivemq.com", 8000, "clientId-workshopiot-32894327894732894329042-harus-unix");

        client.onConnectionLost = onConnectionLost;
        client.onMessageArrived = onMessageArrived;

        client.connect({
            onSuccess: onConnect
        });


        function onConnect() {
            console.log("onConnect");
            client.subscribe(topicSub);
        }

        function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
                console.log("onConnectionLost:" + responseObject.errorMessage);
            }
        }

        function onMessageArrived(message) {
            let arr = message.payloadString.split("#")
            let data_ph = arr[0]
            let data_tds = arr[1]

            $("#title-ph").html(Number(data_ph).toFixed(2));
            $("#title-tds").html(Number(data_tds).toFixed(2));

            updateGaugePh(data_ph);
            updateGaugeTds(data_tds);
        }
    </script>
    <script>
        function updateGaugePh(data_ph) {
            var opts = {
                angle: 0.15,
                lineWidth: 0.44,
                radiusScale: 1,
                pointer: {
                    length: 0.6,
                    strokeWidth: 0.035,
                    color: '#000000'
                },
                limitMax: false,
                limitMin: false,
                colorStart: '#6FADCF',
                colorStop: '#8FC0DA',
                strokeColor: '#E0E0E0',
                generateGradient: true,
                highDpiSupport: true,

            };
            var target = document.getElementById('gauge-ph');
            var gauge = new Gauge(target).setOptions(opts);
            gauge.maxValue = {{ $ph_max }};
            gauge.setMinValue({{ $ph_min }});
            gauge.animationSpeed = 32;
            gauge.set(data_ph);
        }
    </script>

    <script>
        function updateGaugeTds(data_tds) {
            var opts = {
                angle: 0.15,
                lineWidth: 0.44,
                radiusScale: 1,
                pointer: {
                    length: 0.6,
                    strokeWidth: 0.035,
                    color: '#000000'
                },
                limitMax: false,
                limitMin: false,
                colorStart: '#6FADCF',
                colorStop: '#8FC0DA',
                strokeColor: '#E0E0E0',
                generateGradient: true,
                highDpiSupport: true,

            };
            var target = document.getElementById('gauge-tds');
            var gauge = new Gauge(target).setOptions(opts);
            gauge.maxValue = {{ $tds_max }};
            gauge.setMinValue({{ $tds_min }});
            gauge.animationSpeed = 32;
            gauge.set(data_tds);
        }
    </script>
@endsection
