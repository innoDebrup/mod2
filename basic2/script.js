const fname = document.querySelector("#fname");
const lname = document.querySelector("#lname");
const fullName = document.querySelector("#fullName");
const re = new RegExp("^[A-Za-z]+$");

const update = function () {
  if(!re.test(fname.value)){
    if(re.test(lname.value)){
      fullName.value = `${lname.value}`;
    }
    else{
      fullName.value = ``;
    }
  }
  else {
    if(re.test(lname.value)){
      fullName.value = `${fname.value} ${lname.value}`;
    }
    else{
      fullName.value = `${fname.value}`;
    }
  }

};
