<?php include 'base.php' ?>


<?php
error_reporting(E_ALL ^ E_WARNING);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirm = $_POST['confirm'];
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasse = "login";

    $conn = mysqli_connect($servername, $username, $password, $databasse);

    if(!$conn){
        die("Connection Failed");
    }

    $sql = "select * from `signup` where `email` and `pass`";

    mysqli_query($conn, $sql);

?>


<h1 class='container mb-4'>Login</h1>
<form class='container' action="login.php" method='post'>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="pass" type="password" id="pass" class="form-control" id="exampleInputPassword1">
  </div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>