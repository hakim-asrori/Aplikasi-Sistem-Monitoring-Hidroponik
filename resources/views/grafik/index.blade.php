@extends('layout.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="grafik-container"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-script')
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

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

            updateAllDataChart(data_ph, data_tds);
        }
    </script>

    <script>
        var time = new Date();
        var rawData = [{
            name: 'PH',
            x: [time],
            y: [],
            mode: 'lines',
            line: {
                color: 'blue'
            },
            type: 'scatter'
        }, {
            name: 'TDS',
            x: [time],
            y: [],
            mode: 'lines',
            line: {
                color: 'green'
            },
            type: 'scatter'
        }];

        Plotly.plot('grafik-container', rawData);

        function updateAllDataChart(dataPh, dataTds) {
            var update = {
                x: [
                    [time],
                    [time]
                ],
                y: [
                    [dataPh],
                    [dataTds]
                ]
            }

            var olderTime = time.setMinutes(time.getMinutes() - 1);
            var futureTime = time.setMinutes(time.getMinutes() + 1);

            console.log(futureTime);

            var minuteView = {
                xaaxis: {
                    type: 'date',
                    range: [olderTime, futureTime]
                }
            }

            Plotly.relayout('grafik-container', minuteView);
            Plotly.extendTraces('grafik-container', update, [0, 1])
        }
    </script>
@endsection
