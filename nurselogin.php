<!DOCTYPE html>
<html>
<head>
  <title>MY LOG IN FORM </title>
  <link rel="stylesheet" type="text/css" href="./css/login.css">
  </head>
<body>
<div class="hero">
<div class="form-box">
  <div class="button-box">
    <div id="btn"></div>
    <button type="button" class="toggle-btn" onclick="login()">Log in</button>
    <button type="button" class="toggle-btn" onclick="register()">Register</button>
    </div>
    <div class="social-icons">
  <img src="./images/fb.png">
  <img src="./images/google.png">
  <img src="./images/Twitter.png">
  <img src="./images/Instagram.png">
</div>
<form id="login" class="input-group" action="nursevalidation.php" method="post">
  <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" class="input-field" placeholder="Username" name="name" required>
  <i class="fa fa-lock" aria-hidden="true"></i>
  <input type="password" class="input-field" placeholder="Password" name="pass" required>
  <button type="submit" class="submit-btn" name="sub">Log in</button>
  <button class="submit-btn"><a href="index.php">Back</a></button>
  </form>
  <form id="register" class="input-group" action="<?php $PHO_SELF;?>" method="post">
    <i class="fa fa-user" aria-hidden="true"></i>
    <input type="text" class="input-field" placeholder="User Id(digits)" name="ID" required>
    <i class="fa fa-user" aria-hidden="true"></i>
    <input type="email" class="input-field" placeholder="Username" name="name" required>
    <i class="fa fa-lock" aria-hidden="true"></i>
    <input type="password" class="input-field" placeholder="Password" name="pass" required>
    <button type="submit" class="submit-btn" name="sub">Sign in</button>
    </form>
  </div>
  </div>
<script>
  var x=document.getElementById("login");
  var y=document.getElementById("register");
  var z=document.getElementById("btn");

  function register(){
    x.style.left="-400px";
    y.style.left="50px";
    z.style.left="110px";
  }
  function login(){
  x.style.left="50px";
  y.style.left="400px";
  z.style.left="0px";
}
  </script>
  <?php
  if(isset($_POST["sub"])){
    if(!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['ID'])){
      $name=$_POST['name'];
      $pass=$_POST['pass'];
      $ID=$_POST['ID'];

      $conn=new mysqli("localhost","root","") or die (mysqli_error());
      $db=mysqli_select_db($conn, 'medical') or die ("DB error");
      $query=mysqli_query($conn, "SELECT * FROM user where username='".$name."'");
      $numrows=mysqli_num_rows($query);
      if($numrows == 0){
          $sql="INSERT INTO nurse(USER_ID,PASSWORD,USERNAME) VALUES('".$ID."','".$pass."','".$name."')";
          $result=mysqli_query($conn, $sql);
          if($result){
          echo "Registration successful";
          session_start();
          $_SESSION['USERNAME']=$name;
          header('location:Nurse.php');
        }else{
          echo "failure";
        }
      }else{
      echo"Username already exist";
      }
    }
  }
   ?>

</body>
</html>
