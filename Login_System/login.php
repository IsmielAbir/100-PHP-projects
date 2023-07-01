<?php include 'base.php' ?>

<?php
error_reporting(E_ALL ^ E_WARNING);
$login = false;
$error = false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
          
          $sql = "Select * from `signup` where email='$email' AND pass='$pass'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: index.php");

        }
          
        }
        else{
          $error = "Invalid";
          
        }
        
    

   

    

?>
 <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($error){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $error.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
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