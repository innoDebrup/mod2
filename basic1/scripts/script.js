const firstName = document.querySelector("#firstName");
const lastName = document.querySelector("#lastName");
const fullName = document.querySelector("#fullName");
const re = new RegExp("^[A-Za-z]+$");
/**
 * This Function Updates the fullname
 */
const update = function () {
  if (!re.test(firstName.value)) {
    if (re.test(lastName.value)) {
      fullName.value = `${lastName.value}`;
    } else {
      fullName.value = ``;
    }
  } else {
    if (re.test(lastName.value)) {
      fullName.value = `${firstName.value} ${lastName.value}`;
    } else {
      fullName.value = `${firstName.value}`;
    }
  }
};
