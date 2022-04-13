app.controller("chairController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });

  $scope.type = "CHA";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("tableController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "TAB";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("sofaController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "SOF";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("drawerController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "DRA";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("lampController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "LAM";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("chargerController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "CHG";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("bedController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "BED";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("mattressController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "MAT";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("nightstandController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "NST";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("mirrorController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "MIR";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("sinkController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "SIN";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("binController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      }
      else {
        openNav();
      }
    });
  $scope.type = "BIN";

  var data = JSON.stringify({ type: $scope.type });

  $http
    .post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    });
});

app.controller("checkoutController", function ($scope, $http) {
  closeNav();

  $scope.totalCost = 0;

  $http.post("php/displayItems.php").then(function successCallback(response) {
    let res = JSON.stringify(response.data.items[0]);
    let ress = JSON.parse(res);
    $scope.items = ress;
    console.log($scope.items);

    for (let i in $scope.items.items) {
      $scope.totalCost =
        parseFloat($scope.totalCost) + (parseFloat($scope.items.items[i].cost) * $scope.items.items[i].quantity);
    }
    $scope.totalCost = $scope.totalCost.toFixed(2);
    console.log($scope.totalCost);
  });
});

app.controller(
  "deliveryPaymentController",
  function ($scope, $http, $localStorage) {
    $http.post("php/loadSelect.php").then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.address = ress.addresses;
      $scope.carrier = ress.carriers;
      $scope.paymentMethods = ress.paymentMethods;
      console.log($scope.paymentMethods);
    });
    $scope.formData;

    $scope.submitFormData = function () {
      $http
        .post("php/updateOrderVariables.php", $scope.formData)
        .then(function successCallback(response) {
          $localStorage.reviewData = response.data;
          console.log($localStorage.reviewData);
          window.location.href = "#!review";
        });
    };
  }
);

app.controller("reviewController", function ($scope, $localStorage) {
  $scope.reviewVariables = $localStorage.reviewData;
  console.log($scope.reviewVariables);
});

app.controller("shoppingController", function ($scope, $http) {
  $scope.$on('$locationChangeSuccess', function (event, newUrl, oldURL) {
    console.log("updating Cart");
    $http.post("php/displayItems.php").then(function successCallback(response) {
      console.log(response);
      if (response.data.msg == "false") {
        $scope.items = [];
        closeNav();
      }
      else {
        let res = JSON.stringify(response.data.items[0]);
        let ress = JSON.parse(res);
        $scope.items = ress;
        console.log($scope.items);
      }
    });

  });
});
