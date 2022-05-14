var topicPub = "hidroponik_polindra_aksi"
var topicSub = "hidroponik_polindra_data"

// Create a client instance
client = new Paho.MQTT.Client("broker.emqx.io", 8084, "clientId-workshopiot-32894327894732894329042-harus-unix");

// set callback handlers
client.onConnectionLost = onConnectionLost;
client.onMessageArrived = onMessageArrived;

// var options = {
//     time
// }

// connect the client
client.connect({onSuccess:onConnect, useSSL: true});


// called when the client connects
function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    console.log("onConnect");
    client.subscribe(topicSub);
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
        console.log("onConnectionLost:"+responseObject.errorMessage);
    }
}

// called when a message arrives
function onMessageArrived(message) {
    // console.log("onMessageArrived:"+message.payloadString);
    let arr = message.payloadString.split("#")
    let data_ph = arr[0]
    let data_tds = arr[1]
    let relay_1 = arr[2]
    let relay_2 = arr[3]
    let relay_3 = arr[4]
    let relay_4 = arr[5]

    if (data_ph == null || data_tds == null) {
        $("#ph, #tds").html('0')
    } else {
        $("#ph").html(Number(data_ph).toFixed(2));
        $("#tds").html(Number(data_tds).toFixed(2))
    }

    if (relay_1 == "R1_ON") {
        $("#relay_1").attr('checked', 'checked');
    } else {
        $("#relay_1").removeAttr('checked');
    }
    if (relay_2 == "R2_ON") {
        $("#relay_2").attr('checked', 'checked');
    } else {
        $("#relay_2").removeAttr('checked');
    }
    if (relay_3 == "R3_ON") {
        $("#relay_3").attr('checked', 'checked');
    } else {
        $("#relay_3").removeAttr('checked');
    }
    if (relay_4 == "R4_ON") {
        $("#relay_4").attr('checked', 'checked');
    } else {
        $("#relay_4").removeAttr('checked');
    }

}

cbR1 = document.getElementById('relay_1');
cbR2 = document.getElementById('relay_2');
cbR3 = document.getElementById('relay_3');
cbR4 = document.getElementById('relay_4');

cbR1.addEventListener('change', e => {
    if(e.target.checked){
        message = new Paho.MQTT.Message("R1_ON");
        message.destinationName = topicPub;
        client.send(message);
    } else {
        message = new Paho.MQTT.Message("R1_OFF");
        message.destinationName = topicPub;
        client.send(message);
    }
});

cbR2.addEventListener('change', e => {
    if(e.target.checked){
        message = new Paho.MQTT.Message("R2_ON");
        message.destinationName = topicPub;
        client.send(message);
    } else {
        message = new Paho.MQTT.Message("R2_OFF");
        message.destinationName = topicPub;
        client.send(message);
    }
});

cbR3.addEventListener('change', e => {
    if(e.target.checked){
        message = new Paho.MQTT.Message("R3_ON");
        message.destinationName = topicPub;
        client.send(message);
    } else {
        message = new Paho.MQTT.Message("R3_OFF");
        message.destinationName = topicPub;
        client.send(message);
    }
});

cbR4.addEventListener('change', e => {
    if(e.target.checked){
        message = new Paho.MQTT.Message("R4_ON");
        message.destinationName = topicPub;
        client.send(message);
    } else {
        message = new Paho.MQTT.Message("R4_OFF");
        message.destinationName = topicPub;
        client.send(message);
    }
});
