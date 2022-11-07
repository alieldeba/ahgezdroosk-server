const mongoose = require("mongoose");

const groupsModel = mongoose.Schema({
  name: {
    type: String,
    required: true,
  },
  capacity: {
    type: Number,
    required: true,
  },
});

module.exports = mongoose.model("groups", groupsModel);
