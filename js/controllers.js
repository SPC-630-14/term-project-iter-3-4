app.controller('chairController', function ($scope, $http) {
  $scope.type = 'CHA';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('tableController', function ($scope, $http) {
  $scope.type = 'TAB';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('sofaController', function ($scope, $http) {
  $scope.type = 'SOF';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});


app.controller('drawerController', function ($scope, $http) {
  $scope.type = 'DRA';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('lampController', function ($scope, $http) {
  $scope.type = 'LAM';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('chargerController', function ($scope, $http) {
  $scope.type = 'CHG';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});


app.controller('bedController', function ($scope, $http) {
  $scope.type = 'BED';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('mattressController', function ($scope, $http) {
  $scope.type = 'MAT';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('nightstandController', function ($scope, $http) {
  $scope.type = 'NST';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});



app.controller('mirrorController', function ($scope, $http) {
  $scope.type = 'MIR';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('sinkController', function ($scope, $http) {
  $scope.type = 'SIN';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('binController', function ($scope, $http) {
  $scope.type = 'BIN';

  var data = JSON.stringify({ type: $scope.type });

  $http.post("php/catalogue.php", data)
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
    })
});

app.controller('checkoutController', function ($scope, $http) {

  $scope.totalCost = 0;

  $http.post("php/displayItems.php")
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.items = ress;
      console.log($scope.items);

      for (let i in $scope.items.items) {
        $scope.totalCost = parseFloat($scope.totalCost) + parseFloat($scope.items.items[i].cost);
      };
      console.log($scope.totalCost);

    })
});

app.controller('deliveryPaymentController', function ($scope, $http, $localStorage) {

  $http.post("php/loadSelect.php")
    .then(function successCallback(response) {
      let res = JSON.stringify(response.data.items[0]);
      let ress = JSON.parse(res);
      $scope.address = ress.addresses;
      $scope.carrier = ress.carriers;
      $scope.paymentMethods = ress.paymentMethods;
      console.log($scope.paymentMethods);
    });
  // $http.post("php/displayItems.php")
  //   .then(function successCallback(response) {
  //     let res = JSON.stringify(response.data.items[0]);
  //     let ress = JSON.parse(res);
  //     $scope.items = ress;
  //     console.log($scope.items);
  //   });

  $scope.formData;

  $scope.submitFormData = function () {

    $http.post("php/updateOrderVariables.php", $scope.formData)
      .then(function successCallback(response) {
        $localStorage.reviewData = response.data;
        console.log($localStorage.reviewData);
        window.location.href = "#!review"
      })
  }
});


app.controller('reviewController', function ($scope, $localStorage) {
  $scope.reviewVariables = $localStorage.reviewData;
});