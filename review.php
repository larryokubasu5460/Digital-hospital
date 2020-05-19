<?php
$db=new mysqli("localhost","root","","medical");

if(isset($_GET['search'])){
  $search=$db->escape_string($_GET['search']);
  $query=$db->query("
  SELECT PATIENT_ID, FIRST_NAME,LAST_NAME,SURNAME
  FROM registration
  WHERE PATIENT_ID LIKE '%{$search}%'
  ");

    $res = array();
    if ($query->num_rows > 0)  {
        while($r=$query->fetch_object()){
          $res += [$r->PATIENT_ID => ["FRST" => $r->FIRST_NAME, "SRN" => $r->SURNAME, "LST" => $r->LAST_NAME]];
        }
        print_r(json_encode($res));
    } else{
      echo  0;
    }
  } else {
    echo 0;
  }
?>
