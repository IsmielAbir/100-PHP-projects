<?php include 'base.php'; ?>


<?php
error_reporting(E_ALL ^ E_WARNING);

if($_SERVER['REQUEST_METHOD']=='POST'){
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $dsc = $_POST['dsc'];
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
  die("Connection Failed");
}


  $sql = "INSERT INTO `contact` (`name`, `email`, `description`) VALUES ('$name', '$email', '$dsc')";


mysqli_query($conn, $sql)


?>


<div class="form-container">

<form action="contact.php" method="post">
  
    <h1>Contact</h1>
    
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Full Name</label>
    <input name="name" type="name" class="form-control" id="name" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
  </div>
    
 
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea name="dsc" type="email" class="form-control" id="email" rows="10" cols="30" aria-describedby="emailHelp"></textarea>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
  <br><br>
</form>
</div>