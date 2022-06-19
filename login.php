<?php
include("dbconnection.php");
session_start();

if (isset($_POST["user"]) && !isset($_SESSION["user"])) {

  $myusername = mysqli_real_escape_string($conn, $_POST['user']);
  $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT * FROM users WHERE user = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $active = $row['active'];
  $count = mysqli_num_rows($result);

  // echo $count;
  // die();

  if ($count == 1) {
    $_SESSION["user"] = $_POST["user"];
  } else {
    $failed = true;
  }
}

if (isset($_SESSION["user"])) {
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

  <style>
    body {
      background: #007bff;
      background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
    }

    .btn-google {
      color: white !important;
      background-color: #ea4335;
    }

    .btn-facebook {
      color: white !important;
      background-color: #3b5998;
    }
  </style>
</head>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            <form method="post" target="_self">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="username" name="user">
                <label for="floatingInput">username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">
                <label for="floatingPassword">password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                  in</button>
              </div>
              <hr>
              <?php if (isset($failed)) { ?>
                <div id="bad-login">Invalid user or password.</div>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</html>