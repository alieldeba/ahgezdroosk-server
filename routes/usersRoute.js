// example.com/users
// example.com/users/register
const express = require("express");

const {
  getUsers,
  register,
  login,
  deleteUser,
} = require("../controllers/usersController.js");

const router = express.Router();

router.get("/", getUsers);
router.post("/register", register);
router.post("/login", login);
// router.delete("/", deleteUser);

// * get a specific user (get)
// get users that signed up (get)
// get users that logged in (get)
// * delete a user (delete)
// delete all users (delete)
// * log out a user (???)

module.exports = router;
