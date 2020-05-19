<?php

$errors=array();
if(isset($_POST["sub"])){
  if(!empty($_POST['name']) && !empty($_POST['pass'])){
    $name=$_POST['name'];
    $pass=$_POST['pass'];

    if (empty($name && $pass)) {
      array_push($errors, "All inputs required");
    }

$conn = new mysqli("localhost", "root", "","medical") or die (mysqli_error());


if(count($errors)==0){
$query=mysqli_query($conn,"SELECT * FROM secretary where USERNAME='".$name."' && PASSWORD='".$pass."'");
$numrows=mysqli_num_rows($query);

if($numrows!=0){
  while($row=mysqli_fetch_assoc($query))
  {
    $dbusername=$row['USERNAME'];
    $dbpassword=$row['PASSWORD'];
    $dbid=$row['USER_ID'];
  }
  if($name == $dbusername && $pass == $dbpassword)
  {
  session_start();
   $_SESSION['USER_ID']=$dbid;
   $_SESSION['USERNAME']=$dbusername;
    header('location:secretary.php');
  }
}
else{
  array_push($errors,"Wrong username or password combination");

}
}
}
}
 ?>
