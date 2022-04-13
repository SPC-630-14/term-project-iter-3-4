function logOut() {

    $.ajax({
        method: "POST",
        url: "php/signUpLogin/logOut.php",
        success: function () {
            document.getElementById("login").setAttribute("href", "#!login");
            document.getElementById("login-Btn").innerHTML = "Login";
            $("#logOut-Btn").remove();
            alert("You have logged off.");
            window.location.href = "#!";

        },
        error: function () {
            alert("You have logged off.");
            window.location.href = "#!";
        }
    });
};

window.onload = setTimeout(logOut(), 500);
