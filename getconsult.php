<?php
$db=new mysqli("localhost","root","","medical");

if(isset($_GET['search'])){
  $search=$db->escape_string($_GET['search']);
  $query=$db->query("
  SELECT PATIENT_ID, PATIENT_DIAGNOSIS,DOCTOR_ID
  FROM diagnosis
  WHERE PATIENT_ID LIKE '%{$search}%'
  ");

    $res2 = array();
    if ($query->num_rows > 0)  {
        while($r=$query->fetch_object()){
          $res2 += [$r->PATIENT_ID => ["DIG" => $r->PATIENT_DIAGNOSIS, "DOC" => $r->DOCTOR_ID]];
        }
        print_r(json_encode($res2));
    } else{
      echo  0;
    }
  } else {
    echo 0;
  }
?>
