<head>
  <title>Sign Up!</title>
  <link rel="stylesheet" type="text/css" href="css/signUpLogin/signup.css" />
      </head>

<body>

  <div class="bg-tresult">
    <div class="container">
      <h1 class="headings">Welcome New User!</h1>
      <h3 class="headings">Please Sign Up to use our Services!</h3>
      <h4 class="headings">
        Already have an Account? <a class="redirect" href="#!login">Login!</a>
      </h4>
      <form action="" method="post"> 
        <div class="form-group">
          <label> First Name: </label>
          <br />
          <input class="form-control" name="firstName" type="text" />
        </div>
        <div class="form-group">
          <label> Last Name: </label>
          <br />
          <input class="form-control" name="lastName" type="text" />
        </div>
        <div class="form-group">
          <label> Username: </label>
          <br />
          <input class="form-control" name="username" type="text" />
        </div>
        <div class="form-group">
          <label> Password: </label>
          <br />
          <input class="form-control" name="password" type="text" />
        </div>
        <div class="form-group">
          <label> Email Address: </label>
          <br />
          <input class="form-control" name="emailAddress" type="text" />
        </div>
        <div class="form-group">
          <label> Phone Number: </label>
          <br />
          <input class="form-control" name="phoneNumber" type="text" />
        </div>
        <div class="form-group">
          <label> Mailing Address:</label>
          <br />
          <input class="form-control" name="mailingAddress" type="text" />
        </div>
        <button type="submit" class="btn btn-info" name="button" value="submit">
          Sign Up
        </button>
        <input type="hidden" name="action" value="registration"/>
        <div class="alert alert-danger" role="alert" id="responseContainer">wow</div>
      </form>
    </div>
  </div>
  <script src="js/signUp.js"></script>
</body>
