var modal = document.getElementById("myModal");
var btn = document.getElementById("myButton");
var span = document.getElementsByClassName("close")[0];

var userAC = document.getElementById("userac");
var history = document.getElementById("history");
var setting = document.getElementById("setting");
var logout = document.getElementById("logout");


var div = document.getElementById("div");
var user = document.getElementById("user");
var history1 = document.getElementById("History");

var storedData = sessionStorage.getItem('input');



function btnclick(element) {

    if (modal.classList.contains("show")) {
        modal.classList.remove("show");
        setTimeout(function () {
            modal.style.display = "none";
        }, 300);
    } else {
        modal.style.display = "block";
        modal.classList.add("show");

        // 計算按鈕位置
        var buttonRect = element;
        console.log(buttonRect)
        var buttonTop = buttonRect.top + buttonRect.height;
        console.log(buttonTop);

        modal.style.top = buttonTop + 10 + "px";
        modal.style.left = buttonRect.left - 100 + "px";
        console.log(modal.style.top);
        user.style.display = "none";
        div.style.display = "block";
        console.log(user);
        console.log(history);
        history1.style.display = "none";



    }
}


function userAccountOnclick() {

    div.style.display = "none";
    user.style.display = "block";



}


document.getElementById("close").onclick = function () {
    user.style.display = "none";
    div.style.display = "block";


}
document.getElementById("close1").onclick = function () {

    div.style.display = "block";
    history1.style.display = "none";

}

document.getElementById("history").onclick = function () {
    div.style.display = "none";
    history1.style.display = "block";
}

document.getElementById("logout").onclick = function () {
    window.location.href = "logout.php";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.classList.remove("show");
        setTimeout(function () {
            modal.style.display = "none";
        }, 300);
    }
}
