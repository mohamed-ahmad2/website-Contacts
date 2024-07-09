let user = document.getElementsByTagName("input")[0];
let email = document.getElementsByTagName("input")[1];
let birthday = document.getElementsByTagName("input")[2];

let error = document.getElementsByClassName("error");


user.addEventListener("focus", function () {
    error[0].textContent = "";
});

user.addEventListener("blur", function () {
    if (!/^[a-zA-Z].{2,}$/.test(user.value.trim())) {
        if (user.value.trim() == "") {
            error[0].textContent = "The username is required";
        } else if (user.value.trim().length < 3) {
            error[0].textContent = "The username must be at least 3 characters long";
        } else {
            error[0].textContent = "The username must start with a letter";
        }
    }
});

email.addEventListener("focus", function () {
    error[1].textContent = "";
});

email.addEventListener("blur", function () {
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        if (email.value.trim() == "") {
            error[1].textContent = "The email is required";
        } else {
            error[1].textContent = "The email is invalid";
        }
    }
});

birthday.addEventListener("focus", function () {
    error[2].textContent = "";
});

birthday.addEventListener("input", function () {
    if (birthday.value.trim() == "") {
        error[2].textContent = "The birthday is required";
    } else {
        error[2].textContent = "";
    }
});
