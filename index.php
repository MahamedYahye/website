<?php
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script type="text/javascript">
    function data_table() {

      $(document).ready(function() {
        $.ajax({
          type: "GET",
          url: "datatable.php",
          dataType: "html",
          success: function(response) {
            $("#responsecontainer").html(response);
          }
        });
      });
    }

    window.setInterval('data_table()', 1000);
    // setTimeout(function(){
    //    window.location.reload();
    // }, 10000);
  </script>

  <style>
    .rtable th {
      font-size: 15px;
      text-align: left;
      text-transform: uppercase;
      background: #a9a9a9;
    }

    .rtable td {
      background: #C0C0C0;
    }
  </style>

</head>

<body>



  <div class="container">
    <div class="row">

      <div class="col-md-12" style="margin-top:50px">
        <form method="post">
          <input type="hidden" name="logout" value="1" />
          <input type="submit" value="Logout" />
        </form>
        <a href="dashboard.php" style="height:30px ;  width:100px ;   font-size: 15px; margin-left: 90%" class="btn btn-secondary">Dashboard</a>
        <h4>Temprature Record</h4>
        <hr>



        <div class="table-responsive">

          <div id="responsecontainer" align="center">

          </div>
        </div>

</body>

</html>