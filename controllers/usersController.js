const User = require("../models/UserModel.js");

// handle errors
const handleErrors = (err) => {
  let errors = { name: "", telephone: "", email: "", password: "" };

  // duplicate email error
  if (err.code == 11000) {
    errors.email = "هذا البريد تم التسجيل به من قبل";
    return errors;
  }

  // validation errors
  if (err.message.includes("users validation failed")) {
    Object.values(err.errors).forEach(({ properties }) => {
      errors[properties.path] = properties.message;
    });
  }

  return errors;
};

const getUsers = async (req, res) => {
  try {
    const users = await User.find();

    res.status(200).json({ user });
  } catch (error) {
    res.status(404).send("There is no users")
  }
};

const addUser = async (req, res) => {
  try {
    const { name, email, telephone, password } = req.body;
    user = await User.create({
      name,
      telephone,
      email,
      password,
    });
    
    user.save();

    res.status(201).json({user});
  } catch (error) {
    const errors = handleErrors(error);
    res.json({ errors });
  }
};

const deleteUser = async (req, res) => {
  try {
    const { id } = req.body;
    await User.findByIdAndDelete(id);

    res.send(`User deleted successfuly`);
  } catch (error) {
    const errors = handleErrors(error);
    res.status(404).json({ errors });
  }
};

const deleteAllUsers = async (req, res) => {
  try {
    await User.deleteMany();

    res.send(`All users were deleted successfuly`);
  } catch (error) {
    const errors = handleErrors(error);
    res.status(404).json({ errors });
  }
};

module.exports = { getUsers, addUser, deleteUser, deleteAllUsers };
