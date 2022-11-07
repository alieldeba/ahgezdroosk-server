const mongoose = require("mongoose");

const usersModel = mongoose.Schema({
  firstName: {
    type: String,
    required: true,
  },
  lastName: {
    type: String,
    required: true,
  },
  email: {
    type: String,
    required: true,
  },
  password: {
    type: String,
    required: true,
  },
  telephone: {
    type: Number,
    required: true,
  },
});

module.exports = mongoose.model("users", usersModel);
