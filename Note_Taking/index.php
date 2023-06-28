<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Taking</title>
    <link rel="stylesheet" href="../Portfolio/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
   
</head>
<body>

<?php
error_reporting(E_ALL ^ E_WARNING);


    if($_SERVER['REQUEST_METHOD']=='POST'){
        $title = $_POST['title'];
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

    $sql = "INSERT INTO `crud` (`title`, `description`) VALUES ('$title', '$dsc')";

    mysqli_query($conn, $sql);

    
?>
<div class="form-container">

<form action="index.php" method="post">
  
    <h1>Contact</h1>
    
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" type="title" class="form-control" id="title" aria-describedby="emailHelp">
  </div>
    
 
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea name="dsc" type="email" class="form-control" id="dsc" rows="10" cols="30" aria-describedby="emailHelp"></textarea>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
  <br><br>
</form>
</div>
<div>
<table class="table container bgColor">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
<?php

    $selectQuery = "select * from `crud`";
    $result = mysqli_query($conn, $selectQuery);
    if($result>0){
        $id=0;
        while($row = mysqli_fetch_assoc($result)){
            $id= $id+1;
            echo " <tr>
      <th scope='row'>". $id . "</th>
      <td>". $row['title'] . "</td>
      <td>". $row['description'] . "</td>
      <td><button class='btn btn-primary'>Edit</button>
      <button class='delete btn btn-sm btn-primary' onclick='deleteElementById(this)' >Delete</button>
      </td>
    </tr>";
        }
    }
?>
 
    <script src="../js/bootstrap.bundle.js"></script>
    
</body>
</html>