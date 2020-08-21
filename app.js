
    //Camera Authentication
    var ip_address = "192.168.0.9"
    //camera username and password
    var username = "admin";
    var password="gabo.camara.123";

    //A channel of camera stream
    Stream = require('node-rtsp-stream');
    stream = new Stream({
        //streamUrl: 'rtsp://' + username + ':' + password + '@' + ip_address +':554/Streaming/channels/201/&subtype=0&unicast=true&proto=Onvif',
        streamUrl: 'rtsp://' + username + ':' + password + '@' + ip_address +':554/Streaming/channels/201/',
        wsPort: 9999    
    });
