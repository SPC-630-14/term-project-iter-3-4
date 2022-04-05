<head>
  <title>Login!</title>
  <link rel="stylesheet" type="text/css" href="css/signUpLogin/login.css" />
</head>

<body>
  <div class="bg-tresult">
    <div class="container">
      <h1 class="headings">Welcome Winner!</h1>
      <h3 class="headings">Please Login to use our Services!</h3>
      <h4 class="headings">
        Don't have an Account?
        <a class="redirect" href="#!signUp">Create an Account!</a>
      </h4>
      <form method="post" action="login.php">
        <div class="form-group">
          <label>Username:</label>
          <br />
          <input class="form-control" name="username" type="text" />
        </div>
        <div class="form-group">
          <label> Password: </label>
          <br />
          <input class="form-control" name="password" type="text" />
        </div>

        <button type="submit" class="btn btn-info" name="button" value="submit">
          Login
        </button>
      </form>
    </div>
  </div>
</body>
