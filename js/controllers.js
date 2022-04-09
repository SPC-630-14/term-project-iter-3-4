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
