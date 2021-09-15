// import section
const axios = require("axios");
const http = require("http");

// server configuration
const port = 8080

// define our credentials
const mailnjoyId = "" // your id here
const mailnjoySecret = "" // your secret here
const mailnjoyServer = "https://api.mailnjoy.com/"

http.createServer((req, res) => {
  let response = res

  let url = mailnjoyServer + "v1/credit/"
  let options = {
    "headers": {
      "mailnjoy-id": mailnjoyId,
      "mailnjoy-secret": mailnjoySecret
    }
  }

  axios.get(url, options)
  .then(result => {
    // Send the result
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.end("You have " + result.data + " credits left")
  }).catch(error => {
    // handle error
    response.writeHead(200, {"Content-Type": "text/plain"});
    response.end(error)
  })
}).listen(port);


// Console will print the message
console.log("Server running at http://127.0.0.1:"+port+"/");