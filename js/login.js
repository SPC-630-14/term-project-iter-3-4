$("form").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: "php/signUpLogin/login.php",
        data: $("form").serialize(),
        success: function (response) {

            let res = JSON.parse(response);
            console.log(response);
            console.log(res);
            alert(res.msg);
            if (res.msg == "Your Logged In!") {
                document.getElementById("login").setAttribute("href", "#!");
                document.getElementById("login-Btn").innerHTML = res.user;
                login();
                document.getElementById("log-out").setAttribute("href", "#!logOut");
                window.location.href = "#!";
            }
        },
        error: function (response) {
            let res = JSON.parse(response.responseText);
            $("#dialog1").html(res.msg);
            $("#dialog1").show();
            $("#dialog1").dialog();
        },
    });
});
