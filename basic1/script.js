const fname = document.querySelector("#fname");
const lname = document.querySelector("#lname");
const fullName = document.querySelector("#fullName");

const update = function () {
  fullName.value = `${fname.value} ${lname.value}`;
};
