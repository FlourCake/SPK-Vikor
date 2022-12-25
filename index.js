//express section
const express = require('express');
const app = express();
const bp = require("body-parser");
const http = require('http');
const path = require('path')
const socket = http.createServer(app);
const { Server } = require('socket.io');
const io = new Server(socket);
const router = require("./routes/routes.js");

app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');
app.use(bp.urlencoded({ extended: false }));
app.use(bp.json());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "static")));
app.use(router);

const port = process.env.PORT || 5000;

(async () => {
	socket.listen(port, () => {
		console.log(`Server Running at PORT: ${port}`)
	});
})();

module.exports = socket;