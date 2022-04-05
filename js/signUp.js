$("form").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: "php/signUpLogin/signUp.php",
        data: $("form").serialize(),
        success: function (response) {
            let res = JSON.parse(response);
            alert(res.msg);
            if (res.msg == "Your registration is complete!")
                window.location.href = "#!login";
        },
        error: function (response) {
            let res = JSON.parse(response.responseText);
            $("#dialog").html(res.msg);
            $("#dialog").show();
            $("#dialog").dialog();
        },
    });
});
