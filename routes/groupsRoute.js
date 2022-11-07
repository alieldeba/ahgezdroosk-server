// example.com/groups
const express = require("express");

const { getGroups, addGroup, deleteGroup } = require("../controllers/groupsController.js");

const router = express.Router();

router.get("/", getGroups);
router.post("/", addGroup);
router.delete("/", deleteGroup);

module.exports = router;