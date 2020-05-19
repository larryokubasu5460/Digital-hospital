<?php
if(isset($_POST['sub1'])){
	$patid=$_POST['patid'];
	$firstname=$_POST['firstname'];
	$surname=$_POST['surname'];
	$lastname=$_POST['lastname'];
	$date=$_POST['date'];
	$sec=$_POST['secid'];


$conn=new mysqli("localhost","root","","medical");
if($conn->connect_error){
	die ("Connection failed".$conn->connect_error);
}
else {
	$stmt=$conn->prepare("INSERT INTO review(PATIENT_ID,FIRST_NAME, SURNAME, LAST_NAME, DATE,SECRETARY_ID) VALUES(?,?,?,?,?,?)");
	$stmt->bind_param("isssii",$patid,$firstname,$surname,$lastname,$date,$sec);
	$stmt->execute();
	echo "Registration successful";
	$stmt->close();
	$conn->close();
}
}
 ?>
