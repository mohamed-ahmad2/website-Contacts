let user = document.getElementsByTagName("input")[0];
let email = document.getElementsByTagName("input")[1];
let pass = document.getElementsByTagName("input")[2];

let error = document.getElementsByClassName("error");
let btn = document.getElementsByTagName("button")[0];
let notFind  = document.querySelector('.notFind');

user.addEventListener("focus", function () {
  notFind.style.display = 'none';
  error[0].textContent = "";
  user.style.marginBottom = "30px";
  error[0].style.marginBottom = "0px";
});

user.addEventListener("blur", function () {
  if (!/^[a-zA-Z].{2,}$/.test(user.value.trim())) {
    error[0].style.marginBottom = "13px";
    user.style.marginBottom = "2px";
    error[0].style.fontSize = "16px";
    if (user.value.trim() == "") {
      error[0].textContent = "The username is required";
    } else if (user.value.trim().length < 3) {
      error[0].textContent = "the username less than 3";
    } else {
      error[0].textContent = "The username must start with a letter";
    }
  }
});

email.addEventListener("focus", function () {
  notFind.style.display = 'none';
  error[1].textContent = "";
  email.style.marginBottom = "30px";
  error[1].style.marginBottom = "0px";
});

email.addEventListener("blur", function () {
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
    error[1].style.marginBottom = "13px";
    email.style.marginBottom = "2px";
    error[1].style.fontSize = "16px";
    if (email.value.trim() == "") {
      error[1].textContent = "The email is required";
    } else {
      error[1].textContent = "The email is invalid";
    }
  }
});

pass.addEventListener("focus", function () {
  notFind.style.display = 'none';
  error[2].textContent = "";
  pass.style.marginBottom = "30px";
  error[2].style.marginBottom = "0px";
});

pass.addEventListener("blur", function () {
  if (!/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(pass.value.trim())) {
    error[2].style.marginBottom = "13px";
    pass.style.marginBottom = "2px";
    error[2].style.fontSize = "16px";
    if (pass.value.trim() == "") {
      error[2].textContent = "The password is required";
    } else if (pass.value.trim().length < 8) {
      error[2].textContent = "the password less than 8";
    } else {
      error[2].textContent =
        "the password not contain on chracter captail or small or number";
    }
  }
});

btn.addEventListener("click", function (e) {
  let user = document.getElementsByTagName("input")[0];
  let email = document.getElementsByTagName("input")[1];
  let pass = document.getElementsByTagName("input")[2];
  let month = document.getElementsByTagName("select")[0];
  let day = document.getElementsByTagName("select")[1];
  let year = document.getElementsByTagName("select")[2];
  let birth = document.getElementById("birth");
  let gender = document.getElementsByTagName("select")[3];
  let error = document.getElementsByClassName("error");

  if (!/^[a-zA-Z].{2,}$/.test(user.value.trim())) {
    error[0].style.marginBottom = "13px";
    user.style.marginBottom = "2px";
    error[0].style.fontSize = "16px";
    if (user.value.trim() == "") {
      error[0].textContent = "The username is required";
    } else if (user.value.trim().length < 3) {
      error[0].textContent = "the username less than 3";
    } else {
      error[0].textContent = "The username must start with a letter";
    }
    e.preventDefault();
  }

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
    error[1].style.marginBottom = "13px";
    email.style.marginBottom = "2px";
    error[1].style.fontSize = "16px";
    if (email.value.trim() == "") {
      error[1].textContent = "The email is required";
    } else {
      error[1].textContent = "The email is invalid";
    }
    e.preventDefault();
  }

  if (!/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(pass.value.trim())) {
    error[2].style.marginBottom = "13px";
    pass.style.marginBottom = "2px";
    error[2].style.fontSize = "16px";
    if (pass.value.trim() == "") {
      error[2].textContent = "The password is required";
    } else if (pass.value.trim().length < 8) {
      error[2].textContent = "the password less than 8";
    } else {
      error[2].textContent =
        "the password not contain on chracter captail or small or number";
    }
    e.preventDefault();
  }

  if (month.value == "0" || day.value == "0" || year.value == "0") {
    error[3].style.marginBottom = "13px";
    birth.style.marginBottom = "0px";
    error[3].style.fontSize = "16px";
    error[3].textContent = "The date of birth is required";
    e.preventDefault();
  }

  if (gender.value == "not") {
    error[4].style.marginBottom = "13px";
    gender.style.marginBottom = "0px";
    error[4].style.fontSize = "16px";
    error[4].textContent = "The gender is required";
    e.preventDefault();
  }
});
