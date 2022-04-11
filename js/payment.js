$("form").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
        method: "POST",
        url: "php/payment.php",
        data: $("form").serialize(),
        success: function (response) {
            let res = JSON.parse(response);
            alert(res.msg);
            window.location.href = "#!deliveryPayment"
        },
        error: function (response) {
            let res = JSON.parse(response.responseText);
            $("#dialog1").html(res.msg);
            $("#dialog1").show();
            $("#dialog1").dialog();
        },
    });
});
