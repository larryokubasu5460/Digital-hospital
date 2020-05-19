<?php
$db=new mysqli("localhost","root","","medical");

if(isset($_GET['searche'])){
  $search=$db->escape_string($_GET['searche']);
  $query=$db->query("
  SELECT *
  FROM labs
  WHERE PATIENT_ID LIKE '%{$search}%'
  ");
  $result1=array();
  if ($query->num_rows > 0)  {
      while($r=$query->fetch_object()){
        $result1 += [$r->PATIENT_ID=> ["SODIUM"=>$r->SODIUM, "CALCIUM"=>$r->IONIZED_CALCIUM, "POTASSIUM"=>$r->POTASSIUM, "CHLORIDE"=>$r->CHLORIDE,
        "CARBON"=>$r->CARBON_DIOXIDE, "BUN"=>$r->BUN,"CREATININE"=> $r->CREATININE,"SUGAR"=>$r->BLOOD_SUGAR,"WBC"=>$r->WHITE_BLOOD_CELLS,"HMB"=>$r->HAEMOGLOBIN,"HEMA"=>$r->HEMATOCRIT,"PLATELETS"=>$r->PLATELETS,
        "PAO"=>$r->PaO2,"PACO"=>$r->PaCO2,"PH"=>$r->pH,"BICARBONATE"=>$r->BICARBONATE,"BASE"=>$r->BASE_EXCESS]];

      }
      print_r(json_encode($result1));
    }
  else{
    echo  0;
  }
} else {
  echo 0;
}
?>
