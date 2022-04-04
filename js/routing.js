var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
  $routeProvider
    .when("/", { templateUrl: "pages/main.php", controller: "HomeController" })
    .when("/aboutus", {
      templateUrl: "pages/aboutus.php",
      controller: "AboutusController",
    })
    .when("/contactus", {
      templateUrl: "pages/contactus.php",
      controller: "ReviewsController",
    })
    .when("/reviews", {
      templateUrl: "pages/reviews.php",
      controller: "ReviewsController",
    })
    .otherwise({ redirectTo: "/" });
});
