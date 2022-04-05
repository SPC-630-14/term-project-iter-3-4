$("form").on("submit", function (e) {
    e.preventDefault();
    console.log("lmao");

    $.ajax({
        method: "POST",
        url: "php/signUpLogin/login.php",
        data: $("form").serialize(),
        success: function (response) {
            let res = JSON.parse(response);
            alert(res.msg);
            if (res.msg == "Your Logged In!")
                window.location.href = "#!";
        },
        error: function (response) {
            let res = JSON.parse(response.responseText);
            $("#dialog1").html(res.msg);
            $("#dialog1").show();
            $("#dialog1").dialog();
        },
    });
});
