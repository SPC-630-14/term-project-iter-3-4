var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
  $routeProvider
    .when("/", { templateUrl: "pages/main.php", })
    .when("/aboutus", {
      templateUrl: "pages/aboutus.php",

    })
    .when("/contactus", {
      templateUrl: "pages/contactus.php",

    })
    .when("/reviews", {
      templateUrl: "pages/reviews.php",

    })
    .when("/signUp", {
        templateUrl: "pages/signUp.php",

      })
    .when("/login", {
        templateUrl: "pages/login.php",

      })
    .otherwise({ redirectTo: "/" });
});
