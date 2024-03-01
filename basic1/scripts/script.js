const firstName = document.querySelector("#firstName");
const lastName = document.querySelector("#lastName");
const fullName = document.querySelector("#fullName");
const re = new RegExp("^[A-Za-z]+$");
/**
 * This Function Updates the value of the disabled FullName input field.
 */
const update = function () {
  //Checks the firstName format according to the regex. If it fails then it enters the IF block.
  if (!re.test(firstName.value)) {
    //If-else structure for lastName. The checks are performed on lastName.
    if (re.test(lastName.value)) {
      fullName.value = `${lastName.value}`;
    } else {
      fullName.value = ``;
    }
  } else {
    //If-else structure for lastName. The checks are performed on lastName.
    if (re.test(lastName.value)) {
      fullName.value = `${firstName.value} ${lastName.value}`;
    } else {
      fullName.value = `${firstName.value}`;
    }
  }
};
