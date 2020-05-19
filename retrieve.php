<?php
$db=new mysqli("localhost","root","","medical");

if(isset($_GET['search'])){
  $search=$db->escape_string($_GET['search']);
  $query=$db->query("
  SELECT *
  FROM vitals
  WHERE PATIENT_ID LIKE '%{$search}%'
  ");

  $result = array();
  if ($query->num_rows > 0)  {
      while($r=$query->fetch_object()){
        $result += [$r->PATIENT_ID => ["TEMP" => $r->TEMPERATURE, "PULSE" => $r->PULSE_RATE, "RESPIRATION" => $r->RESPIRATION_RATE, "BP" => $r->SYSTOLIC_BLOOD_PRESSURE, "OXY" => $r->OXYGEN_SATURATION, "PAIN" => $r->PAIN]];
      }
      print_r(json_encode($result));
  } else{
    echo  0;
  }
} else {
  echo 0;
}
?>
