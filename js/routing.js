var app = angular.module('myApp', ['ngRoute']); 
app.config(function($routeProvider) { 
    $routeProvider  
    .when('/', { templateUrl : 'pages/main.html', 
                  controller : 'HomeController'})  
    .when('/aboutus', { templateUrl : 'pages/aboutus.html', 
               controller : 'AboutusController'})  
    .when('/contactus', { templateUrl : 'pages/contactus.html', 
                controller : 'ReviewsController'}) 
    .when('/reviews', { templateUrl : 'pages/reviews.html', 
                controller : 'ReviewsController'})
    .otherwise({redirectTo: '/'}); 
});