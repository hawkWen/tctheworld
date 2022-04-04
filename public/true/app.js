// ทำการเชื่อม Websocket Server ตาม url ที่กำหนด
var connection = new WebSocket('wss://stream.pushbullet.com/websocket/o.hWpsGU4aR9L3x34iFfrPlfAcaOS3vjJt')
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
  console.log("message from server: ", e.data);
};