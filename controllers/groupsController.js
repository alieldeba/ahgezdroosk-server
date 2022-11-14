const Group = require("../models/GroupModel.js");

const getGroups = async (req, res) => {
  const groups = await Group.find();

  res.send(groups);
};

const addGroup = async (req, res) => {
  const { name, capacity } = req.body;
  group = await Group.create({
    name: name,
    capacity: capacity,
  });

  group.save();

  res.send(`Group added successfuly`);
};

const deleteGroup = async (req, res) => {
  const { id } = req.body;
  await Group.findByIdAndDelete(id);

  res.send(`Group deleted successfuly`)
};

module.exports = { getGroups, addGroup, deleteGroup };
