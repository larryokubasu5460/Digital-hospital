<?php
if(isset($_POST['sub'])){
$patid=$_POST['patid'];
$docid=$_POST['docid'];
$diagnose=$_POST['diag'];
$date=$_POST['date'];

$conn=new mysqli("localhost","root","","medical");
if($conn->connect_error)
{
	die("Connection failed".$conn->connect_error);
}
else{
$stmt=$conn->prepare("INSERT INTO diagnosis(PATIENT_ID,PATIENT_DIAGNOSIS,DOCTOR_ID,DATE) values(?,?,?,?)");
$stmt->bind_param("isii",$patid,$diagnose,$docid,$date);
$stmt->execute();
echo "saved succesful";
$stmt->close();
$conn->close();
}
}
?>
