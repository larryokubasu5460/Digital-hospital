<?php
include("secretaryvalidation.php");
session_start();
date_default_timezone_set("Africa/Nairobi");
?>
<!DOCTYPE hmtl>
<html>
<head>
  <title>PATIENT REGISTRATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/secretary.css" type="text/css">
</head>

<body>

<header>
  <div class="upper">
    <div class="logo">
      <p>NAME: <?php echo $_SESSION['USERNAME']; ?></p>
      <p>ID:<?php echo $_SESSION['USER_ID']; ?></p>
      <p>DESIGNATION:SECRETARY</p>

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100"><path fill="#0099ff" fill-opacity="1" d="M0,0L1440,96L1440,0L0,0Z"></path></svg>

<div class="menu">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li class="active"><a href="#">Patient</a></li>
    <li><a href="nurselogin.php">Vitals</a></li>
    <li><a href="lablogin.php">Laboratory</a></li>
    <li><a href="doctorlogin.php">Diagnose</a></li>
  </ul>
</div>
</div>
</header>

<section>
  <div class="leftside">
    <h3>PATIENT FIRST ADMISSION</h3>
<form class="form" action="<?php $PHP_SELF; ?>" method="post">

  <p><label>Patient ID</label>
  <input type="text" placeholder="National ID" name="patid" requried></p>
  <p><label>First name</label>
  <input type="text" placeholder="Iris" name="firstname" required></p>
  <P>
  <label>Surname</label>
  <input type="text" placeholder="Allen" name="surname" required>
</P>
  <p><label>Last name</label>
  <input type="text" placeholder="West" name="lastname" required></p>
  <p><label>Date</label>
  <input type="text" value="<?php echo date("Y-m-d h:i:sa"); ?>" name="date"></p>
  <p>
  <label>Age</label>
  <input type="text" placeholder="20 years" name="age" required>
</p>
  <p><label>Gender</label>
  <select name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Transgender">Transgender</option>
  </select></p>
  <p>
  <label>Address</label>
  <input type="text" placeholder="Naivasha Road" name="address" required>
</p>
  <p><label>Contact</label>
  <input type="text" placeholder="+25470000000" name="contact" required></p>
  <p>
  <label>Billing</label>
  <select name="bill">
    <option value="cash">Cash</option>
    <option value="insurance">Insurance card</option>
  </select>
</p>
  <p><label>Kin's first name</label>
  <input type="text"placeholder="kin's name" name="kinfname" required></p>
  <p>
  <label>Kin's second name</label>
  <input type="text" placeholder="kin's name" name="kinsname" required>
</p>
  <p><label>Kin's contact</label>
  <input type="text" placeholder="kin's contact" name="kincontact" required></p>
  <p><label>Secretary ID</label>
    <input type="text" name="secid" value="<?php echo $_SESSION['USER_ID']; ?>" required></p>
<div class="buttons">
<button type="submit" class="submitbtn"  name="sub">Submit</button>
<button type="reset" class="clearbtn" value="reset">Clear</button>
</div>
</form>
</div>
 <div class="rightside">
<div id="search">
  <p>
  <label>Search patient</label>
  <input  type="text" placeholder="Patient name" name="search" id="searchQuery">
  <button id="submitSearch">Search</button></p>
  <p id="resultMsg"></p>
</div>

<form class="forme" action="review1.php" method="post">
  <h3>PATIENT REVIEW</h3>
  <p><label>Patient ID</label>
  <input type="text" placeholder="National ID" id="patid" name="patid" requried></p>
  <p><label>First name</label>
  <input type="text" placeholder="Iris" id="fname" name="firstname" required></p>
  <P>
  <label>Surname</label>
  <input type="text" placeholder="Allen" id="sname" name="surname" required>
  </P>
  <p><label>Last name</label>
  <input type="text" placeholder="West" id="lname" name="lastname" required></p>
  <p><label>Date</label>
  <input type="text" value="<?php echo date("Y-m-d h:i:sa"); ?>" name="date"></p>
  <p><label>Secretary ID</label>
    <input type="text" name="secid" value="<?php echo $_SESSION['USER_ID']; ?>" required></p>
<p>
<button class="submitb" type="submit" name="sub1">Submit</button>
<button class="clearb" type="reset" value="reset">Clear</button>
</p>
</form>
<div class="patreview">
<label>Retrieve details</label>
<input type="text" placeholder="PatientID" name="search" id="getrev" >
<button id="submitrev">Retrieve</button></p>
<p id="revresult"></p>
</div>
</div>
</section>
</body>
<?php
if(isset($_POST['sub'])){
	$patid=$_POST['patid'];
	$firstname=$_POST['firstname'];
	$surname=$_POST['surname'];
	$lastname=$_POST['lastname'];
	$date=$_POST['date'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$bill=$_POST['bill'];
	$contact=$_POST['contact'];
	$kinf=$_POST['kinfname'];
	$kins=$_POST['kinsname'];
	$kinc=$_POST['kincontact'];
	$sec=$_POST['secid'];


$conn=new mysqli("localhost","root","","medical");
if($conn->connect_error){
	die ("Connection failed".$conn->connect_error);
}
else {
	$stmt=$conn->prepare("INSERT INTO registration(PATIENT_ID,FIRST_NAME, SURNAME, LAST_NAME, DATE, AGE, GENDER, ADDRESS, CONTACT, BILLING, KIN_FIRSTNAME, KIN_SECONDNAME,KIN_CONTACT,SECRETARY_ID) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("isssiissssssis",$patid,$firstname,$surname,$lastname,$date,$age,$gender,$address,$contact,$bill,$kinf,$kins,$kinc,$sec);
	$stmt->execute();
	echo "Registration successful";
	$stmt->close();
	$conn->close();
}
}
 ?>
<script src="./js/script.js"></script>
<script src="./js/js.js"></script>
</html>
