var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
  $routeProvider
    .when("/", { templateUrl: "pages/main.html", })
    .when("/aboutus", {
      templateUrl: "pages/aboutus.html",

    })
    .when("/contactus", {
      templateUrl: "pages/contactus.html",

    })
    .when("/reviews", {
      templateUrl: "pages/reviews.html",

    })
    .when("/signUp", {
      templateUrl: "pages/signUp.html",

    })
    .when("/login", {
      templateUrl: "pages/login.html",

    })
    .otherwise({ redirectTo: "/" });
});
