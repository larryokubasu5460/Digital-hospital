<?php
session_start();
?>
<!DOCTYPE hmtl>
<html>
<head>
  <title>VITALS</title>

  <link rel="stylesheet" href="./css/nurse.css" type="text/css" />
</head>
<div class="all">
<body class="content clearfix">
    <header>
  <div class="headere">
  <div class="profile">
  <img src="images/nurse1.png">
    <p>Hi I'm <?php echo $_SESSION['USERNAME']; ?></p>
  </div>
  <div class="menu">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="secretarylogin.php">Patient</a></li>
    <li class="active"><a href="#">Vitals</a></li>
    <li><a href="lablogin.php">Laboratory</a></li>
      <li><a href="doctorlogin.php">Diagnose</a></li>
  </ul>
</div>
</div>
</header>
<div class="search">
<label>Search patient</label>
<input  type="text" placeholder="Patient name" name="search" id="searchQuery">
<button id="submitSearch">Search</button></p>
<p id="resultMsg"></p>
</div>
<section>

<div class="leftside">
<img src="images/12.png">
  </div>
  <div class="rightside">
<form id="form" action="<?php $PHP_SELF; ?>" method="post" class="forme">
  <p><label> Nurse ID</label>
    <input type="text" name="nurseid" value="<?php echo $_SESSION['USER_ID']; ?>" required></p>
    <p>
    <label>Patient ID</label>
    <input  type="text" name="patid" id="patid" required></P>
    <p>
    <label>Body Temperature(Celsius)</label>
    <input type="float" min="20" max="50" value="37.0" name="bt"></p>
    <p>
    <label>Pulse Rate/Minute</label>
    <input type="number" min="50" max="200" value="80" name="pulse"></p>
    <p><label>Respiration Rate/Minute</label>
    <input type="number" min="10" max="50" value="15" name="resp"></p>
    <p><label>Systolic blood pressure (mm/Hg)</label>
    <input type="number" min="50" max="300" value="110" name="pressure"></p>
    <p><label>Oxygen Saturation (%)</label>
    <input type="number" min="0" max="200" value="100" name="oxygen"></p>
    <p>
    <label>Pain (out of 10)</label>
    <input type="float" min="0" max="10" value="2.0" name="pain"></p>

    <button class="submitbtn" type="submit" name="sub">Submit</button>
    <button class="clearbtn" type="reset" value="reset">Clear</button>

</form>
</div>
</section>
  </body>
  <script src="./js/script.js"></script>
  <?php
  if(isset($_POST['sub'])){
  $nurseid=$_POST['nurseid'];
  $patid=$_POST['patid'];
  $bodyT=$_POST['bt'];
  $pulseR=$_POST['pulse'];
  $respR=$_POST['resp'];
  $pressure=$_POST['pressure'];
  $oxygen=$_POST['oxygen'];
  $pain=$_POST['pain'];

  $conn=new mysqli("localhost","root","","medical");
  if($conn->connect_error){
    die ("Connection failed" .$conn->connect_error);
  }
  else {
    $stmt=$conn->prepare("INSERT INTO vitals(PATIENT_ID,TEMPERATURE, PULSE_RATE, RESPIRATION_RATE, SYSTOLIC_BLOOD_PRESSURE, OXYGEN_SATURATION,PAIN,NURSE_ID) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("idiiiids",$patid,$bodyT,$pulseR,$respR,$pressure,$oxygen,$pain,$nurseid);
    $stmt->execute();
    echo "Registration succesful";
    $stmt->close();
    $conn->close();
  }
  }
   ?>
  </html>
