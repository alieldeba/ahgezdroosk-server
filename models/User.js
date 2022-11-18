const mongoose = require("mongoose");
const { isEmail } = require("validator");
const bcrypt = require("bcrypt");

const UserSchema = mongoose.Schema({
  name: {
    type: String,
    trim: true,
    required: [true, "الرجاء إدخال اسم"],
    maxlength: [10, "الحد الأقصى لطول الاسم هو 10 أحرف"],
  },
  telephone: {
    type: Number,
    required: [true, "الرجاء إدخال رقم هاتفك"],
    // min: [10, "طول رقم الهاتف يجب ان يكون 11 رقم"],
    // max: [12, "طول رقم الهاتف يجب ان يكون 11 رقم"],
  },
  email: {
    type: String,
    required: [true, "الرجاء إدخال البريد الإلكترونى"],
    validate: [isEmail, "الرجاء إدخال بريد إلكتروني صالح"],
    lowercase: true,
    unique: true,
  },
  password: {
    type: String,
    required: [true, "الرجاء إدخال كلمة المرور"],
    minlength: [6, "الحد الأدنى لطول كلمة المرور هو 6 أحرف"],
  },
  date: {
    type: Date,
    default: new Date(),
  },
});

// Fire a function before saving user to db
// Hashing the user password
UserSchema.pre("save", async function (next) {
  const salt = await bcrypt.genSalt();
  this.password = await bcrypt.hash(this.password, salt);
  next();
});

module.exports = mongoose.model("users", UserSchema);