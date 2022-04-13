app.controller("chairController", function ($scope, $http) {
  $http
    .post("php/signUpLogin/checkLogin.php")
    .then(function successCallback(response) {
      console.log(response.data);
      if (response.data.status == "closed") {
        window.location.href = "#!";
        alert("Please Log In!");
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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
      } else {
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

app.controller("checkoutController", function ($scope, $http, $localStorage) {
  closeNav();

  $scope.totalCost = 0;
  $scope.totalQuantity = 0;

  $http.post("php/displayItems.php").then(function successCallback(response) {
    let res = JSON.stringify(response.data.items[0]);
    let ress = JSON.parse(res);
    $scope.items = ress;
    console.log($scope.items);

    for (let i in $scope.items.items) {
      $scope.totalCost =
        parseFloat($scope.totalCost) +
        parseFloat($scope.items.items[i].cost) * $scope.items.items[i].quantity;
      $scope.totalQuantity = $scope.totalQuantity + parseInt($scope.items.items[i].quantity);
    }
    $scope.totalCost = $scope.totalCost.toFixed(2);
    $scope.send = [{
      totalCost: $scope.totalCost,
      totalQuantity: $scope.totalQuantity
    }];
    console.log($scope.send);
    $http.post("php/updateCheckoutVariables.php", $scope.send).then(function successCallback(response) {
      console.log(response);
    });
  });
});

app.controller(
  "deliveryPaymentController",
  function ($scope, $http, $localStorage) {
    $scope.oldVariables = $localStorage.checkout;
    $http.post("php/loadSelect.php").then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.address = ress.addresses;
      $scope.carrier = ress.carriers;
      $scope.paymentMethods = ress.paymentMethods;
      $scope.formData;

      console.log($scope.paymentMethods);
      if ($scope.paymentMethods.length === 0) {
        console.log($scope.paymentMethods);
        $scope.paymentMethods = [{
          payment: "No Payment Methods",
          id: 0
        }];
        console.log($scope.paymentMethods);
      }
      else {
        console.log("not Empty");
      }
    });

    $scope.$watch('formData.payment', function (newValue, oldValue) {
      if ($scope.formData === undefined) {
        null;
      }
      if ($scope.formData.payment == 0) {
        window.location.href = "#!payment";
      }
    });
    $scope.$watch('formData.assembly', function (newValue, oldValue) {
      if ($scope.formData === undefined) {
        null;
      }
      else {
        console.log($scope.formData.assembly);
      }
    });



    $scope.submitFormData = function () {
      if ($scope.paymentMethods.length > 0) {
        $http
          .post("php/updateDeliveryVariables.php", $scope.formData)
          .then(function successCallback(response) {
            $localStorage.reviewData = response.data;
            console.log($localStorage.reviewData);

            window.location.href = "#!review";
          });
      };
    };
  }
);

app.controller("reviewController", function ($scope, $http) {
  $http.post("php/retrieveOrderVars.php").then(function successCallback(response) {
    $scope.orderVars = response.data.orderVars;
    $scope.items = response.data.items[0].items;
    console.log($scope.orderVars);
    console.log($scope.items);
    var Neat = parseFloat($scope.orderVars.totalCost) + 50.00;
    $scope.totalDeliveryCost = Neat.toFixed(2);
    console.log($scope.totalDeliveryCost)

    initMap(parseFloat($scope.orderVars.userLAT), parseFloat($scope.orderVars.userLONG), parseFloat($scope.orderVars.storeLAT), parseFloat($scope.orderVars.storeLONG));
  })
});

app.controller("shoppingController", function ($scope, $http) {
  $scope.$on("$locationChangeSuccess", function (event, newUrl, odURL) {
    console.log("updating Cart");
    $http.post("php/displayItems.php").then(function successCallback(response) {
      //console.log(response);
      if (response.data.msg == "false") {
        $scope.items = [];
        closeNav();
      } else {
        let res = JSON.stringify(response.data.items[0]);
        let ress = JSON.parse(res);
        $scope.items = ress;
        //console.log($scope.items);
      }
    });
  });
});
