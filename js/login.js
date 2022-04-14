$("form").on("submit", function (e) {
  e.preventDefault();

  $.ajax({
    method: "POST",
    url: "php/signUpLogin/login.php",
    data: $("form").serialize(), //seiralizes to json so can send
    success: function (response) {
      //http: 200 is the response
      let res = JSON.parse(response);
      console.log(response);
      console.log(res);
      alert(res.msg);
      if (res.msg == "Your Logged In!") {
        document.getElementById("login").setAttribute("href", "http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=termproject");
        document.getElementById("login-Btn").innerHTML = res.user;
        login();
        document.getElementById("log-out").setAttribute("href", "#!logOut");
        window.location.href = "#!processing";
      }
    },
    error: function (response) {
      //http: 406 is error
      console.log(response);
      let res = JSON.parse(response.responseText);
      $("#dialog1").html(res.msg);
      $("#dialog1").show();
      $("#dialog1").dialog();
      //alert(res.msg);
    },
  });
});
