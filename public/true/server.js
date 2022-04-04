const WebSocket = require('ws');
const request = require('request');

var connection = new WebSocket('wss://stream.pushbullet.com/websocket/o.nL9wv7SKv3JCUZOibTNSUvMJrdcXBs6q');
connection.onopen = function () {
  // จะทำงานเมื่อเชื่อมต่อสำเร็จ
  console.log("connect webSocket");
  connection.send("Hello ABCDEF"); // ส่ง Data ไปที่ Server
};
connection.onerror = function (error) {
  console.error('WebSocket Error ' + error);
};
connection.onmessage = function (e) {
  // log ค่าที่ถูกส่งมาจาก server
  //console.log("message from server: ", e.data);
  const obj = JSON.parse(e.data);

let date_ob = new Date();

let day = date_ob.getDate();

let month = date_ob.getMonth();

let year = date_ob.getFullYear();
// current hoursa;
let hours = date_ob.getHours();

// current minutes
let minutes = date_ob.getMinutes();

let secound = date_ob.getSeconds();

  console.log(hours + ":" + minutes);

  console.log(obj);
  if(obj.type==='push'&&obj.push.application_name==='TrueMoney'){
    
    

      request.post(
        'https://play.moradok88.com/sms/pbtrue.php',
        {
          json: {
            subject: obj.push.application_name,
            message: obj.push.body,
            notification_id: obj.push.notification_id,
            date: year+'-'+month+'-'+day+' '+hours+':'+minutes+':'+secound
          },
        },
        (error, res, body) => {
          if (error) {
            console.error(error)
            return
          }
          console.log(`statusCode: ${res.statusCode}`)
          console.log(body)
        }
      )

  }
};


