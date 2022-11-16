// example.com/users
const express = require("express");

const {
  getUsers,
  addUser,
  deleteUser,
} = require("../controllers/usersController.js");

const router = express.Router();

router.get("/", getUsers);
router.post("/", addUser);
router.delete("/", deleteUser);

// * get a specific user (get)
// get users that signed up (get)
// get users that logged in (get)
// * sign up a user (post)
// * log in a user (post)
// * delete a user (delete)
// delete all users (delete)
// * log out a user (???)

module.exports = router;
