<?php
$conn = mysqli_connect("localhost","root","","orange");
$id=$_GET['id'];
$query= "SELECT * FROM students where student_email='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if($row){
    echo " <div class='alert alert-danger' role='alert'>
    email is already exist
  </div>";
}
else{
    echo "<div class='alert alert-success' role='alert'>
    email is avliable
  </div>";
}

?>