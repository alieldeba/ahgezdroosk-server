const usersModel = require("../models/usersModel.js");

const getUsers = async (req, res) => {
  const users = await usersModel.find();

  res.send(users);
};

const addUser = async (req, res) => {
  const { firstName, lastName, email, telephone, password } = req.body;
  user = await usersModel.create({
    firstName,
    lastName,
    email,
    telephone,
    password,
  });

  user.save();

  res.send(`User added successfuly`);
};

const deleteUser = async (req, res) => {
  const { id } = req.body;
  await usersModel.findByIdAndDelete(id);

  res.send(`User deleted successfuly`);
};

const deleteAllUsers = async (req, res) => {
  await usersModel.deleteMany();

  res.send(`All users were deleted successfuly`);
};

module.exports = { getUsers, addUser, deleteUser, deleteAllUsers };
