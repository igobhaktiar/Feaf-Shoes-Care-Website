<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- CSS -->
  <link rel="stylesheet" href="style_register.css">
  <title>Register</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-7 offset-md-2">
        <div class="login-form">
          <form action="simpan-pendaftaran.php" method="post">
              <div>
                  <h1 class="h3 mt-3 text-center">Create an account.</h1>
              </div><br>
              <div class="form-group">
                  <input class="form-control" placeholder="Name" type="text" name="nama" required="required">
              </div>
              <div class="form-group">
                  <input class="form-control" placeholder="Phone Number" name="no_hp" type="text" required="required">
              </div>
              <div class="form-group">
                  <input class="form-control" placeholder="Email" name="email" type="text" required="required">
              </div>
              <div class="form-group">
                  <input class="form-control" placeholder="Address" name="alamat" type="text" required="required">
              </div>
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required="required">
              </div>
              <div class="form-group">
                  <input class="form-control" name="password" placeholder="Password" type="password" required="required">
              </div>
              <!-- <div class="form-group">
                  <input class="form-control" placeholder="Confirm Password" type="password" required="">
              </div> -->
              <div class="form-group">
                  <center> <input type="submit" class="btn btn-block btn-primary" name="submit" value="Register"> </center>
              </div>
              <p class="text-center">Have an already account?<a href="login.php">Login here</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

