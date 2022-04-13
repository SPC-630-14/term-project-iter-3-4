var app = angular.module("myApp", ["ngRoute", "ngStorage"]);
app.config(function ($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "pages/main.html"
    })
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
    .when("/logOut", {
      templateUrl: "pages/logOut.html",
    })
    .when("/chairs", {
      templateUrl: "pages/catalogue.html",
      controller: "chairController",
    })
    .when("/tables", {
      templateUrl: "pages/catalogue.html",
      controller: "tableController",
    })
    .when("/sofas", {
      templateUrl: "pages/catalogue.html",
      controller: "sofaController",
    })
    .when("/drawers", {
      templateUrl: "pages/catalogue.html",
      controller: "drawerController",
    })
    .when("/lamps", {
      templateUrl: "pages/catalogue.html",
      controller: "lampController",
    })
    .when("/chargers", {
      templateUrl: "pages/catalogue.html",
      controller: "chargerController",
    })
    .when("/beds", {
      templateUrl: "pages/catalogue.html",
      controller: "bedController",
    })
    .when("/mattresses", {
      templateUrl: "pages/catalogue.html",
      controller: "mattressController",
    })
    .when("/nightstands", {
      templateUrl: "pages/catalogue.html",
      controller: "nightstandController",
    })
    .when("/mirrors", {
      templateUrl: "pages/catalogue.html",
      controller: "mirrorController",
    })
    .when("/sinks", {
      templateUrl: "pages/catalogue.html",
      controller: "sinkController",
    })
    .when("/bins", {
      templateUrl: "pages/catalogue.html",
      controller: "binController",
    })
    .when("/checkout", {
      templateUrl: "pages/checkout.html",
      controller: "checkoutController",
    })
    .when("/deliveryPayment", {
      templateUrl: "pages/deliveryPayment.html",
      controller: "deliveryPaymentController",
    })
    .when("/review", {
      templateUrl: "pages/review.html",
      controller: "reviewController",
    })
    .when("/payment", {
      templateUrl: "pages/payment.html",
    })

    .otherwise({ redirectTo: "/" });
});
