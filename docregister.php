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
        $sql="INSERT INTO doctor(USER_ID,PASSWORD,USERNAME) VALUES('".$ID."','".$pass."','".$name."')";
        $result=mysqli_query($conn, $sql);
        if($result){
        echo "Registration successful";
        session_start();
        $_SESSION['USERNAME']=$name;
        header('location:doctor.php');
      }else{
        echo "failure";
      }
    }else{
    echo"Username already exist";
    }
  }
}
 ?>
