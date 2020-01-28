const express = require('express');
const mongo = require('mongodb');

const app = express();
const router = express.Router();
const MongoClient = mongo.MongoClient;

const port = 3000;

app.use(express.static(__dirname + '/'));
app.use(express.static(__dirname + '/public'));

app.use(express.json({ limit: '1kb' }));

app.listen(port, function () {
    console.log("localhost:" +port);
});

app.use(function (req, res, next) {
    res.status(404).send("404 not found");
});

app.use(function (err, req, res, next) {
    res.status(500).send(err.message);
    process.exit(1);
});
