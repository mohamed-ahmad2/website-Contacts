let user = document.getElementsByTagName("input")[0];
let pass = document.getElementsByTagName("input")[1];
let error = document.getElementsByTagName("span");
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
      error[0].textContent = "the username is required";
    } else if (user.value.trim().length < 3) {
      error[0].textContent = "the username less than 3";
    } else {
      error[0].textContent = "the username not contain on chracter";
    }
  }
});

pass.addEventListener("focus", function () {
  notFind.style.display = 'none';
  error[1].textContent = "";
  pass.style.marginBottom = "30px";
  error[1].style.marginBottom = "0px";
});

pass.addEventListener("blur", function () {
  if (!/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(pass.value.trim())) {
    error[1].style.marginBottom = "13px";
    pass.style.marginBottom = "2px";
    error[1].style.fontSize = "16px";
    if (pass.value.trim() == "") {
      error[1].textContent = "the password is required";
    } else if (pass.value.trim().length < 8) {
      error[1].textContent = "the password less than 8";
    } else {
      error[1].textContent =
        "the password not contain on chracter captail or small or number";
    }
  }
});

btn.addEventListener("click", function (e) {
  let user = document.getElementsByTagName("input")[0];
  let pass = document.getElementsByTagName("input")[1];
  let error = document.getElementsByTagName("span");

  if (!/^[a-zA-Z].{2,}$/.test(user.value.trim())) {
    error[0].style.marginBottom = "13px";
    user.style.marginBottom = "2px";
    error[0].style.fontSize = "16px";
    if (user.value.trim() == "") {
      error[0].textContent = "the username is required";
    } else if (user.value.trim().length < 3) {
      error[0].textContent = "the username less than 3";
    } else {
      error[0].textContent = "the username not contain on chracter";
    }
    e.preventDefault();
  }

  if (!/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(pass.value.trim())) {
    error[1].style.marginBottom = "13px";
    pass.style.marginBottom = "2px";
    error[1].style.fontSize = "16px";
    if (pass.value.trim() == "") {
      error[1].textContent = "the password is required";
    } else if (pass.value.trim().length < 8) {
      error[1].textContent = "the password less than 8";
    } else {
      error[1].textContent =
        "the password not contain on chracter captail or small or number";
    }
    e.preventDefault();
  }
});
