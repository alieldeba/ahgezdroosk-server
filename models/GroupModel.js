const mongoose = require("mongoose");

const GroupModel = mongoose.Schema({
  name: {
    type: String,
    required: [true, "Please enter a name"],
    uniqu: true,
  },
  capacity: {
    type: Number,
    required: [true, "Please enter a capacity"],
  },
});

module.exports = mongoose.model("groups", GroupModel);
