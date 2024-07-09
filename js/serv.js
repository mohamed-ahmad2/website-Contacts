let nameC = document.getElementsByTagName("input")[0];
let num = document.getElementsByTagName("input")[1];
let array = document.getElementsByTagName("input");


let error = document.getElementsByClassName("error");

nameC.addEventListener("focus", function () {
    error[0].textContent = "";
});

nameC.addEventListener("blur", function () {
    if (nameC.value.trim() == "") {
        error[0].textContent = "The name is required";
    } else {
        error[0].textContent = "";
    }
});

num.addEventListener("focus", function () {
    error[1].textContent = "";
});

num.addEventListener("blur", function () {
    if (num.value.trim() == "") {
        error[1].textContent = "The number is required";
    } else {
        error[1].textContent = "";
    }
}); 

for(let i=2; i<(array.length); i++){
    array[i].addEventListener("focus", function () {
        error[2].textContent = "";
    });
    
    array[i].addEventListener("blur", function () {
        if (array[i].value.trim() == "") {
            error[2].textContent = "Please enter the name and number to update";
        } else {
            error[2].textContent = "";
        }
    });
}