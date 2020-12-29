<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- CSS -->
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/css/style.css">
</head>

<body>
  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
      echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    }
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="login-form">
          <h1>LOG IN</h1>
          <form action="cek_login.php" method="post">
            <div class="form-group">
              <label>Username</label> <br>
              <input type="text" name="xusername" class="form-control" placeholder="Username .." required="required"><br>
            </div>
            <div class="form-group">
              <label>Password</label><br>
              <input type="password" name="xpassword" class="form-control" placeholder="Password .." required="required"><br>
            </div>
            <hr>
            <!-- <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div> -->
            <input type="submit" class="btn btn-primary" value="LOGIN">
            <br>
            <!-- <a href="">Forgot Password</a> -->
          </form>
          <hr>
          <p class="bawah">Don't have an account?<a href="register.php">Sing Up Here</a></p>
        </div>
      </div>
    </div>
  </div>

</body>

</html>