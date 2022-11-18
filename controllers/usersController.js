const User = require("../models/User.js");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");
require("dotenv").config();

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

// create json web token
const threeDays = 3 * 24 * 60 * 60;
const createToken = (id) => {
  return jwt.sign({ id }, process.env.SECRET, {
    expiresIn: threeDays,
  });
};

const getUsers = async (req, res) => {
  try {
    const users = await User.find();

    res.status(200).json({ users });
  } catch (error) {
    res.status(404).send("There is no users");
  }
};

const register = async (req, res) => {
  try {
    const { name, email, telephone, password } = req.body;
    const user = await User.create({
      name,
      telephone,
      email,
      password,
    });

    const token = createToken(user._id);
    res.cookie("jwt", token, { httpOnly: true, maxAge: threeDays * 1000 });
    res.status(201).json({ user: user._id });
  } catch (error) {
    const errors = handleErrors(error);
    res.json({ errors });
  }
};

const login = async (req, res) => {
  const { email, password } = req.body;

  try {
    const user = await User.find({ email: email });
    console.log(user.password, password);
    if (user) {
      bcrypt.compare(password, user.password, (err, res) => {
        if (err) {
          console.log(err);
        }
        if (res) {
          console.log(res);
        }
      });
    } else {
      res.send("email is not registered");
    }

    const token = createToken(user._id);
    res.cookie("jwt", token, { httpOnly: true, maxAge: threeDays * 1000 });
    res.status(200).json({ user: user._id });
  } catch (err) {
    console.log(err.message);
    const errors = handleErrors(err);
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

module.exports = { getUsers, register, login, deleteUser, deleteAllUsers };
