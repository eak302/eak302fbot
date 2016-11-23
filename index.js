var http = require('http');

// ตั้งค่า server ให้แสดงผลคำว่า "Hello World" ส่งกลับไปที่ client
var server = http.createServer(function (request, response) {
  response.writeHead(200, {"Content-Type": "text/plain"});
  response.end("Hello World\n");
});
 
// กำหนด port ให้ server เป็น port 8000
server.listen(8000);
console.log("Server running at http://127.0.0.1:8000/");