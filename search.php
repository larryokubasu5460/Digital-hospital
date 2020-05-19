<?php
$db=new mysqli("localhost","root","","medical");

if(isset($_GET['search'])){
  $search=$db->escape_string($_GET['search']);
  $query=$db->query("
  SELECT FIRST_NAME,LAST_NAME,PATIENT_ID
  FROM registration
  WHERE FIRST_NAME LIKE '%{$search}%'
  OR LAST_NAME LIKE '%{$search}%'
  OR PATIENT_ID LIKE '%{$search}%'
  ");
  if ($query->num_rows > 0)  {
    if($query->num_rows)
    {
      while($r=$query->fetch_object()){
        echo $r->PATIENT_ID;
      }
    }
  } else{
    echo  0;
  }
} else {
  echo 0;
}
?>
