function logOut() {

    $.ajax({
        method: "POST",
        url: "php/signUpLogin/logOut.php",
        success: function () {
            document.getElementById("login").setAttribute("href", "#!login");
            document.getElementById("login-Btn").innerHTML = "Login";
            $("#logOut-Btn").remove();
            window.location.href = "#!";
            alert("You have logged off.");
        },
        error: function () {
            window.location.href = "#!";
            alert("You have logged off.");
        }
    });
};

window.onload = logOut();
