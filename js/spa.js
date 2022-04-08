$(function () {

    /*FURNITURE*/
    $("#f").hide();

    $("#f-Btn").on("mouseenter", function () {
        $("#f").slideDown(500);
    })

    $("#f").on("mouseleave", function () {
        $("#f").slideUp(300);
    })

    /*HOME OFFICE*/
    $("#h").hide();

    $("#h-Btn").on("mouseenter", function () {
        $("#h").slideDown(500);
    })

    $("#h").on("mouseleave", function () {
        $("#h").slideUp(300);
    })

    /*BEDS*/
    $("#b").hide();

    $("#b-Btn").on("mouseenter", function () {
        $("#b").slideDown(500);
    })

    $("#b").on("mouseleave", function () {
        $("#b").slideUp(300);
    })

    /*BATHROOM*/
    $("#br").hide();

    $("#br-Btn").on("mouseenter", function () {
        $("#br").slideDown(500);
    })

    $("#br").on("mouseleave", function () {
        $("#br").slideUp(300);
    })

}
);



function login() {
    //InsertSignOut after User 
    function insertLogOut(referenceNode, newNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    //Create new <a> and <btn> tag with content
    var newAtag = document.createElement("a");
    newAtag.id = "log-out";

    var newBtn = document.createElement("button");
    newBtn.id = "logOut-Btn";
    newBtn.type = "button";
    var newBtnContent = document.createTextNode("Logout");


    newBtn.appendChild(newBtnContent);
    newAtag.appendChild(newBtn);

    var loginAtag = document.getElementById("login");

    var signout = insertLogOut(loginAtag, newAtag);
    return signout;

}

function openNav() {
    document.getElementById("shopping-cart").style.width = "350px";
    document.getElementById("s-cart").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("shopping-cart").style.width = "0";
    document.getElementById("s-cart").style.marginLeft = "10px";
}


function loginReload() {
    $.ajax({
        method: "POST",
        url: "php/signUpLogin/reloadLogin.php",
        success: function (response) {
            let res = JSON.parse(response);
            document.getElementById("login").setAttribute("href", "#!");
            document.getElementById("login-Btn").innerHTML = res.user;
            login();
            document.getElementById("log-out").setAttribute("href", "#!logOut");

        },
        error: function () {
            console.log("loginReload Failed or user not Logged in");
        },
    });
};

window.onload = loginReload();