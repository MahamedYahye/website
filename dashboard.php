<?php
include("dbconnection.php");
session_start();

if (isset($_POST["logout"])) {
  unset($_SESSION["user"]);
}

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}
?>
<html>

<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
    html,
    body {
      height: 100%;
    }

    body {
      background-color: #a5a5b1;
      display: grid;
      place-items: center;

    }

    .card {
      background-color: #ffffff;
      border-radius: 60px;
      color: #6f707d;
      font-family: 'Marcellus', serif;
    }

    .temp {
      place-items: center;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- <div class="col-12 col-md-4 col-sm-12 col-xs-12"> -->


      <?php
      $result = mysqli_query($conn, "select * from data ORDER BY id DESC LIMIT 1");
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-6 col-md-4 col-sm-6 col-xs-6">
          <div class="card p-4">
            <div class="d-flex">
              <h6 class="flex-grow-1">Weather</h6>
              <h6><?php echo $row['time'] ?></h6>
            </div>

            <div class="d-flex flex-column temp mt-5 mb-3">
              <h1 class="mb-0 font-weight-bold" id="heading"> <?php echo $row['temperature'] ?>&deg; C </h1>
              <!-- <span class="small grey">Stormy</span> -->
            </div>

            <div class="d-flex">
              <div class="temp-details flex-grow-1">
                <p class="my-1">
                  <img src="https://i.imgur.com/B9kqOzp.png" height="17px">

                  <span> Humidity : <?php echo $row['humidity']; ?> </span>
                </p>

                <p class="my-1">
                  <i class="fa fa-tint mr-2" aria-hidden="true"></i>
                  <span>Moisture : <?php echo $row['moisture']; ?></span>
                </p>

                <p class="my-1">
                  <img src="https://i.imgur.com/wGSJ8C5.png" height="17px">
                  <span> Light : <?php echo $row['light']; ?></span>
                </p>
              </div>

              <div>
                <img src="https://i.imgur.com/Qw7npIg.png" width="100px">
              </div>
            </div>
          </div>

        </div>
      <?php } ?>



    </div>
  </div>


  </div>
</body>

</html>