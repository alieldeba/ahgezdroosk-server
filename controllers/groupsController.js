const groupsModel = require("../models/groupsModel.js");

const getGroups = async (req, res) => {
  const groups = await groupsModel.find();

  res.send(groups);
};

const addGroup = async (req, res) => {
  const { name, capacity } = req.body;
  group = await groupsModel.create({
    name: name,
    capacity: capacity,
  });

  group.save();

  res.send(`Group added successfuly`);
};

const deleteGroup = async (req, res) => {
  const { id } = req.body;
  await groupsModel.findByIdAndDelete(id);

  res.send(`Group deleted successfuly`);
};

module.exports = { getGroups, addGroup, deleteGroup };
