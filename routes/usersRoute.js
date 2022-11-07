// example.com/users
const express = require("express");

const { getUsers, addUser, deleteUser } = require("../controllers/usersController.js");

const router = express.Router();

router.get("/", getUsers);
router.post("/", addUser);
router.delete("/", deleteUser);

module.exports = router;
