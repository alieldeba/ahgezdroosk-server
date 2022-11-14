const express = require("express");
const mongoose = require("mongoose");
const cors = require("cors");
const bodyParser = require("body-parser");
const cookieParser = require('cookie-parser')
require("dotenv").config();

const usersRoute = require("./routes/usersRoute.js");
const groupsRoute = require("./routes/groupsRoute.js");

const app = express();

const PORT = process.env.PORT || 3000;

app.use(cors());

// support parsing of application/json type post data
app.use(bodyParser.json());

// support parsing of application/x-www-form-urlencoded post data
app.use(bodyParser.urlencoded({ extended: true }));

app.use(cookieParser())

app.use("/users", usersRoute);
app.use("/groups", groupsRoute);

// Database
mongoose
  .connect(process.env.MONGODB_URI, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(() => {
    app.listen(PORT, () => {
      console.log(`server & db started on localhost:${PORT}`);
    });
  })
  .catch((e) => {
    console.log(e.message);
  });
