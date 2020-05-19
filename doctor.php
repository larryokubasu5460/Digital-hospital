<?php
session_start();
date_default_timezone_set("Africa/Nairobi");
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scaleble=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>CONSULTATION</title>
    <link rel="stylesheet" href="./css/doctor.css" type="text/css" />
    <!-- <link rel="stylesheet" href="./css/chat.css" type="text/css" /> -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="./js/chat.js"></script>
  <!-- <script type="text/javascript">
      // ask user for name with popup prompt
      var name = prompt("Enter your chat name:", "Guest");
      // default name is 'Guest'
    if (!name || name === ' ') {
       name = "Guest";
    }
    // strip tags
    name = name.replace(/(<([^>]+)>)/ig,"");
    // display name on page
    $("#name-area").html("You are: <span>" + name + "</span>");
    // kick off chat
      var chat =  new Chat();
    $(function() {
       chat.getState();
       // watch textarea for key presses
           $("#sendie").keydown(function(event) {
               var key = event.which;
               //all keys including return.
               if (key >= 33) {
                   var maxLength = $(this).attr("maxlength");
                   var length = this.value.length;
                   // don't allow new content if length is maxed out
                   if (length >= maxLength) {
                       event.preventDefault();
                   }
                }
                });
       // watch textarea for release of key press
       $('#sendie').keyup(function(e) {
          if (e.keyCode == 13) {
                  var text = $(this).val();
          var maxLength = $(this).attr("maxlength");
                  var length = text.length;
                  // send
                  if (length <= maxLength + 1) {
                chat.send(text, name);
                $(this).val("");
                  } else {
            $(this).val(text.substring(0, maxLength));
          }}
        });
    });
  </script> -->
</head>
<body onload="setInterval('chat.update()', 1000)">
  <header>
  <div class="logo">
  <h2>DIAGNOSE</h2>
  </div>
    <div class="menu">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="secretarylogin.php">Patient</a></li>
    <li><a href="nurselogin.php">Vitals</a></li>
    <li><a href="lablogin.php">Laboratory</a></li>
    <li class="active"><a href="#">Diagnose</a></li>
</ul>
</div>
</header>
<main>
<section class="hero">
  <div class="container">
  <div class="leftside">
  <div class="leftside-grid chat">
  <h3>SEND PATIENT FOR TEST</h3>
  <div id="page-wrap">
      <p id="name-area"></p>
      <div id="chat-wrap"><div id="chat-area"></div></div>
      <form id="send-message-area">
          <p>Your message: </p>
          <textarea id="sendie" maxlength = '100' ></textarea>
      </form>
  </div>
</div>
  <div class="leftside-grid search">
    <p>
    <label>Search patient</label>
    <input  type="text" placeholder="Patient name" name="search" id="searchQuery">
    <button id="submitSearch">Search</button></p>
    <p id="resultMsg"></p>
      <h3>RETRIEVE BUTTONS</h3>
  <p> <label>Retrieve vitals</label>
    <input  type="text" placeholder="Patient ID" name="search" id="searchQuery1">
    <button id="submitSearch1">Retrieve</button></p>
    <p id="resultMsg1"></p>
    <p>Retrieve tests<input  type="text" placeholder="Patient ID" name="searche" id="searchQuery2">
    <button id="submitSearch2">Retrieve</button></p>
    <p id="resultMsg2"></p>
    </div>
    <div class="leftside-grid details">
      <p><label>Retrieve details</label>
      <input type="text" placeholder="PatientID" name="search" id="getdig" >
      <button id="submitname">Retrieve</button></p>
      <p id="diagresult"></p>
    <label>Previous diagnosis</label><textarea id="showdiag" rows="10" cols="60"></textarea><br>
    <label>Doctor ID</label><input type="text" id="doct">
    </div>
</div>
</div>
</section>
<section class="hero-diag">
  <div class="container">
<form action="<?php $PHP_SELF ;?>" method="post">
  <div id="form-id">
  <div id="form-id-grid symptoms">
    <br><br><br><br><br><br><br><br>
  <h3>Symptoms</h3>
  <p></p>
  <label for="dizzy">Dizziness:</label><br>
  <input type="radio" name="dizzy" value="VH">Very High
  <input type="radio" name="dizzy" value="H">High
  <input type="radio" name="dizzy" value="M">Medium
  <input type="radio" name="dizzy" value="L">Low
  <input type="radio" name="dizzy" value="VL">Vey Low
  <input type="radio" name="dizzy" value="0" checked>None
  <br>
  <label for="headache">Headache:</label><br>
  <input type="radio" name="head" value="VH">Very High
  <input type="radio" name="head" value="H">High
  <input type="radio" name="head" value="M">Medium
  <input type="radio" name="head" value="L">Low
  <input type="radio" name="head" value="VL">Vey Low
  <input type="radio" name="head" value="0" checked>None
  <br>
  <label for="shiver">Shiver:</label><br>
  <input type="radio" name="shiver" value="VH">Very High
  <input type="radio" name="shiver" value="H">High
  <input type="radio" name="shiver" value="M">Medium
  <input type="radio" name="shiver" value="L">Low
  <input type="radio" name="shiver" value="VL">Vey Low
  <input type="radio" name="shiver" value="0" checked>None
  <br>
  <label for="cough">Cough:</label><br>
  <input type="radio" name="cough" value="VH">Very High
  <input type="radio" name="cough" value="H">High
  <input type="radio" name="cough" value="M">Medium
  <input type="radio" name="cough" value="L">Low
  <input type="radio" name="cough" value="VL">Vey Low
  <input type="radio" name="cough" value="0" checked>None
  <br>
  <label for="chest">Chest pain:</label><br>
  <input type="radio" name="chest" value="VH">Very High
  <input type="radio" name="chest" value="H">High
  <input type="radio" name="chest" value="M">Medium
  <input type="radio" name="chest" value="L">Low
  <input type="radio" name="chest" value="VL">Vey Low
  <input type="radio" name="chest" value="0" checked>None
  <br>
  <label for="throat">Sore throat:</label><br>
  <input type="radio" name="throat" value="VH">Very High
  <input type="radio" name="throat" value="H">High
  <input type="radio" name="throat" value="M">Medium
  <input type="radio" name="throat" value="L">Low
  <input type="radio" name="throat" value="VL">Vey Low
  <input type="radio" name="throat" value="0" checked>None
  <br>
  <label for="fatigue">Fatigue/Weakness:</label><br>
  <input type="radio" name="fatigue" value="VH">Very High
  <input type="radio" name="fatigue" value="H">High
  <input type="radio" name="fatigue" value="M">Medium
  <input type="radio" name="fatigue" value="L">Low
  <input type="radio" name="fatigue" value="VL">Vey Low
  <input type="radio" name="fatigue" value="0" checked>None
  <br>
  <label for="diarrhea">Diarrhea:</label><br>
  <input type="radio" name="diarrhea" value="VH">Very High
  <input type="radio" name="diarrhea" value="H">High
  <input type="radio" name="diarrhea" value="M">Medium
  <input type="radio" name="diarrhea" value="L">Low
  <input type="radio" name="diarrhea" value="VL">Vey Low
  <input type="radio" name="diarrhea" value="0" checked>None
  <br>
  <label for="muscle">:Muscle aches/Weakness</label><br>
  <input type="radio" name="muscle" value="VH">Very High
  <input type="radio" name="muscle" value="H">High
  <input type="radio" name="muscle" value="M">Medium
  <input type="radio" name="muscle" value="L">Low
  <input type="radio" name="muscle" value="VL">Vey Low
  <input type="radio" name="muscle" value="0" checked>None
  <br>
  <label for="breathe">Breathing:</label><br>
  <input type="radio" name="breathe" value="VH">Very Fast
  <input type="radio" name="breathe" value="H">Fast
  <input type="radio" name="breathe" value="M">Medium
  <input type="radio" name="breathe" value="L">Slow
  <input type="radio" name="breathe" value="VL">Vey Slow
  <input type="radio" name="breathe" value="0" checked>None
  <br>
  <label for="anxiety">Anxiety:</label><br>
  <input type="radio" name="anxiety" value="VH">Very High
  <input type="radio" name="anxiety" value="H">High
  <input type="radio" name="anxiety" value="M">Medium
  <input type="radio" name="anxiety" value="L">Low
  <input type="radio" name="anxiety" value="VL">Vey Low
  <input type="radio" name="anxiety" value="0" checked>None
  <br>
  <label for="nausea">Nuasea and vomiting:</label><br>
  <input type="radio" name="nausea" value="VH">Very High
  <input type="radio" name="nausea" value="H">High
  <input type="radio" name="nausea" value="M">Medium
  <input type="radio" name="nausea" value="L">Low
  <input type="radio" name="nausea" value="VL">Vey Low
  <input type="radio" name="nausea" value="0" checked>None
  <br>
  <label for="appetite">Loss of appetite:</label><br>
  <input type="radio" name="appetite" value="VH">Very High
  <input type="radio" name="appetite" value="H">High
  <input type="radio" name="appetite" value="M">Medium
  <input type="radio" name="appetite" value="L">Low
  <input type="radio" name="appetite" value="VL">Vey Low
  <input type="radio" name="appetite" value="0" checked>None
  <br>
  <label for="fever">Fever:</label><br>
  <input type="radio" name="fever" value="VH">Very High
  <input type="radio" name="fever" value="H">High
  <input type="radio" name="fever" value="M">Medium
  <input type="radio" name="fever" value="L">Low
  <input type="radio" name="fever" value="VL">Vey Low
  <input type="radio" name="fever" value="0" checked>None
  <br>
  </div>

<div id="form-id-grid" class="vitals">
<h3>Retrieved vitals</h3>
  <p><label>Body Temperature(Celsius)</label>
    <input type="float" id="bt" name="bt"></p>
  <p><label>Pulse Rate/Minute</label><input type="number" min="50" id="pulse" name="pulse"></p>
  <p><label>Respiration Rate/Minute</label><input type="number" id="resp" name="resp"></p>
  <p><label>Systolic blood pressure (mm/Hg)</label><input type="number" id="pressure" name="pressure"></p>
  <p><label>Oxygen Saturation (%)</label><input type="number" id="oxygen" name="oxygen"></p>
  <p><label>Pain (out of 10)</label><input type="float" id="pain" name="pain"></p>
</div>
<div id="form-id-grid" class="tests">
    <h3>Retrieved tests</h3>
    <p><label>Sodium (mEq/Litre)</label><input type="float" id="sodium" name="sodium"></p>
    <p><label>Ionized calcium</label><input type="number"  id="calcium" name="calcium"></p>
    <p><label>Potassium</label><input type="number" id="potassium" name="potassium"></p>
    <p><label>Chloride</label><input type="number" id="chloride" name="chloride"></p>
    <p><label>Carbon dioxide</label><input type="number" id="carbon" name="carbon"></p>
    <p><label>Blood Urea nitrate</label><input type="float" id="bun" name="bun"></P>
    <p><label>Creatinine</label><input type="float" id="creatinine" name="creatinine"></p>
    <p><label>Blood sugar</label><input type="float" id="sugar" name="sugar"></p>
    <p><label>White blood cell</label><input type="float" id="wbc" name="wbc"></p>
    <p><label>Haemoglobin</label><input type="float" id="hmb" name="hmb"></p>
    <p><label>Hematocrit</label><input type="float" id="hema" name="hema"></p>
    <p><label>Platelets</label><input type="number" id="platelets" name="platelets"></p>
    <p><label>PaO2</label><input type="number" id="pao" name="pao"></p>
    <p><label>PaCO2</label><input type="number" id="paco" name="paco"></p>
    <p><label>pH</label><input type="float" id="ph" name="ph"></p>
    <p><label>Bicarbonate</label><input type="number" id="bicarbonate" name="bicarbonate"></p>
    <p><label>Base excess</label><input type="number" id="base" name="base"></p>

      <p>
      <button type="submit" name="submit1">Diagnose</button>
      <button type="reset" value="reset">Clear</button>
    </p>
    </div>
    </div>
  </form>
</div>
</section>
<section class="hero-pred">
  <div class="container">
<div class="southside">
  <div class="southsie-grid save">
  <form action="diagnosis.php" method="post">
<h3>SAVE DIAGNOSIS</h3>
<p><label>Patient ID</label>
<input type="varchar" name="patid" id="patid" placeholder="Search name to get ID" required></p>
  <p id="resultMsg"></p>
<p><label>Doctor ID</label>
  <input type="varchar" name="docid" value="<?php echo $_SESSION['USER_ID']; ?>" requried></p>
  <p><label>Date</label>
  <input type="text" value="<?php echo date("Y-m-d h:i:sa"); ?>" name="date"></p>
  <label>Diagnosis</label>
    <textarea id="diagn" rows="10" cols="60" name="diag"></textarea>
  <p>
  <button type="submit" name="sub">Submit</button>
  <button type="reset">Clear</button><br>
</p>
</form>
</div>
<div class="southside-grid predict">
<br><br><h3>PREDICTED DIAGNOSIS</h3>
    <script src="./js/js.js"></script>
    <script src="./js/script.js"></script>
    <textarea id="getdiag" rows="10" cols="60">
      <?php
      if(isset($_POST['submit1'])){

        $bt=(float)$_POST['bt'];
        $pulse=(int)$_POST['pulse'];
        $resp=(int)$_POST['resp'];
        $pressure=(int)$_POST['pressure'];
        $oxygen=(int)$_POST['oxygen'];
        $pain=(float)$_POST['pain'];
        $sodium=(int)$_POST['sodium'];
        $calcium=(float)$_POST['calcium'];
        $potassium=(float)$_POST['potassium'];
        $chloride=(int)$_POST['chloride'];
        $carbon=(int)$_POST['carbon'];
        $bun=(int)$_POST['bun'];
        $creatinine=(float)$_POST['creatinine'];
        $sugar=(int)$_POST['sugar'];
        $wbc=(float)$_POST['wbc'];
        $hmb=(float)$_POST['hmb'];
        $hema=(float)$_POST['hema'];
        $platelets=(int)$_POST['platelets'];
        $pao=(int)$_POST['pao'];
        $paco=(int)$_POST['paco'];
        $ph=(float)$_POST['ph'];
        $bicarbonate=(int)$_POST['bicarbonate'];
        $base=(int)$_POST['base'];
      //   if(empty($_POST['radio'])){
      //     $fever=$shiver=$cough=$chest=$diarrhea=$fatigue=$muscle=$throat=$anxiety=$nausea=$breathe="";
      // }
        $shiver=$_POST['shiver'];
        $cough=$_POST['cough'];
        $dizzy=$_POST['dizzy'];
        $fatigue=$_POST['fatigue'];
        $chest=$_POST['chest'];
        $diarrhea=$_POST['diarrhea'];
        $throat=$_POST['throat'];
        $nausea=$_POST['nausea'];
        $breathe=$_POST['breathe'];
        $muscle=$_POST['muscle'];
        $anxiety=$_POST['anxiety'];
        $fever=$_POST['fever'];
        $appetite=$_POST['appetite'];
        $head=$_POST['head'];

        // header("Content-Type: text/plain");
        // $output = shell_exec("python diagnose1.py $bt,$pulse,$resp,$pressure,$oxygen,$pain,$sodium,$calcium,$potassium,$chloride,$carbon,$bun,$creatinine,$sugar,$wbc,$hmb,$hema,$platelets,$pao,$paco,$ph,$bicarbonate,$base");
        // echo $output;
        $vh="VH";
        $h="H";
        $m="M";
        $l="L";
        $vl="VL";
        function diagnosis(){
          global $bt,$pulse,$resp,$pressure,$oxygen,$pain,$sodium,$calcium,$potassium,$chloride,$carbon,$bun,$creatinine,$sugar,$wbc,$hmb,$hema,$h,$m,$vl,$fever,$head,
          $platelets,$pao,$paco,$ph,$bicarbonate,$base,$shiver,$cough,$chest,$diarrhea,$breathe,$anxiety,$throat,$nausea,$fatigue,$muscle,$dizzy,$vh,$l,$appetite;
          if(($bt<35.0 and $bt>0) || $shiver==($vh||$h) && $breathe==($vh||$h) && $fatigue==($vh||$h)){
            echo "POSSIBLE DIAGNOSIS:
                  Hypothermia
                  POSSIBLE INTERVENTIONS:
                  Bair Hugger
                  Warm Normal Saline IV";

          }
          elseif($bt>=38.5 || ($muscle==($vh||$h) && $nausea==($vh||$h) && $fatigue==($vh||$h) && $dizzy==($vh||$h))){
            echo "POSSIBLE DIAGNOSIS:
                  Hyperthermia
                  Malignant Hyperthermia
                  Heart Stroke
                  MDMA Induced Hyperthermia
                  POSSIBLE INTERVENTIONS:
                  1000mg Tylenol
                  Pan Culture
                  Dantroline
                  Ice Bath";
          }
          else{
            echo "";
          }
          if(($pulse<=50 and $pulse>0) || $dizzy==($vh||$h) && $fatigue==($vh||$h) && $breathe==($vh||$h) && $chest==($vh||$h) ){
            echo "POSSIBLE DIAGNOSIS:
                  Sinus Bradycardia
                  Junctional Rhythm
                  Heart block
                  POSSIBLE INTERVENTIONS:
                  Obtain EKG, prepare pacemaker
                  Atropine or Epinephrine
                      ";
          }
           elseif($pulse>=110 && $pulse<=160){
             echo "POSSIBLE DIAGNOSIS:
                   Sinus Tachycardia
                   Artrial Fibrillation
                   Artrial Flutter
                   Dehydration
                   POSSIBLE INTERVENTIONS:
                   Obtain EKG, 2 litres Normal Saline IV
                   Considere Amiodarone
                       ";
           }
           elseif($pulse>=161 && $pulse<=220){
             echo "POSSINLE DIAGNOSIS:
                   V-FIB
                   Stroke
                   Hypertrophic obstructive cardiomyopathy
                   POSSINLE INTERVENTIONS:
                   Palliative care
                   IV esmolol
                   IV nitroglycerin
                       ";
           }
           else{
             echo "";
           }
           if($resp>20 || $cough==($vh||$h) && $breathe==($l||$vl) && $appetite==($vh||$h) && $chest==($vh||$h) && $fatigue==($vh||$h) && $nausea==($h||$m)){
            echo  "POSSIBLE DIAGNOSIS:
                   Kussmauls
                   Cheyne-stokes
                   Pneumonia
                   POSSIBLE INTERVENTIONS:
                   Incentive spirometer 15mins a day
                   2 grams sodium per day
                   2-3 litres of fluids
                      ";
           }
           elseif($resp<12 and $resp>0){
             echo "POSSIBLE DIAGNOSIS:
                   Hyperpnoea
                   Biots
                   Apnoea
                   POSSIBLE INTERVENTIONS:
                   Administer naloxone
                   Thyroid medication ";
           }
           else{
             echo "";
           }
           if($pressure>120 && $pressure<=129){
             echo "POSSIBLE DIAGNOSIS:
                   Elevated pressure
                   POSSIBLE INTERVENTIONS:
                   Healthy lifestyle ";
           }
           elseif($pressure>=130 && $pressure<=139){
             echo "POSSIBLE DIAGNOSIS:
                   Hypertension stage 1:
                   High blood pressure
                   Heart disease
                   stroke
                   Kidney disease
                  POSSIBLE INTERVENTIONS:
                   Administer diuretics
                   Give beta-blockers
                   Give angiotensin converting enzyme
                   Calcium channel blockers ";
           }
           elseif($pressure>=140){
             echo "POSSIBLE DIAGNOSIS:
                    Hypertension stage 2:
                   POSSIBLE INTERVENTIONS:
                    Give diuretics
                    Give beta-blockers
                    Calcium channel blockers
                    ";
           }
           elseif($pressure>=180){
             echo "POSSIBLE DIAGNOSIS:
                   Hypertensive crisis:
                   POSSIBLE INTERVENTIONS:
                   Give diuretics
                   Give beta-blockers
                   Calcium channel blockers ";
           }
           else{
             echo"";
           }
           if($oxygen<90 and $oxygen>0){
             echo "POSSIBLE DIANGOSIS:
                   Hypoxemia
                   POSSIBLE INTERVENTIONS:
                   Oxygen therapy";
           }
           elseif($oxygen>100){
             echo "POSSIBLE DIAGNOSIS:>br>
                   Hypoxia
                   POSSIBLE INTERVENTIONS:
                   Intubation
                   Hyperbic chamber ";
           }
           else{
             echo "";
           }
           if($pain>3 && $pain<=6){

             echo "POSSIBLE DIAGNOSIS:
                   Mild pain
                   POSSIBLE INTERVENTIONS:
                   Codeine
                   Acetaminophen
                   Aspirin
                       ";
           }
           elseif($pain>7){
             echo "POSSIBLE DIAGNOSIS:
                   Acute pain
                   POSSIBLE INTERVENTIONS
                   Morphine
                   Hyrocodone
                   Oxycodone
                      ";
           }
           else{
             echo "";
           }
           if($sodium>=158 && $sodium<160){
            echo "POSSIBLE DIAGNOSIS:
                  Hypernatremia
                  POSSIBLE INTERVENTIONS:
                  Restore serum tonicity
                  IV normal saline ";
           }
           elseif(($sodium<135 and $sodium>0) || $fatigue==($vh||$h) && $head==($vh||$h) && $muscle==($vh||$h) && $nausea==($vh||$h) ){
             echo "POSSIBLE DIAGNOSIS
                   Hyponatremia
                   POSSIBLE INTERVENTIONS:
                   IV fluids
                   Insulin
                   Statin therapy
                      ";
           }
           else{
             echo "";
           }
           if($calcium>=5.50){
             echo "POSSIBLE DIAGNOSIS
                   Hypoparathyroidism
                   Osteomalacia
                   Acute pancreatitis
                   POSSIBLE INTERVENTIONS
                   Activate vitamin D and calcium supplements
                   Surgery to correct borne deformities
                       ";
           }
           elseif($calcium<1.17 and $calcium>0){
             echo "POSSIBLE DIAGNOSIS:
                   Hypocalcemia
                   Hyperparathyroidism
                   Multiple myeloma
                   Sarcoidosis
                   Tuberculosis
                  POSSIBLE INTERVENTIONS:
                   IV gluconate
                   Oral calcium and vitamin D supplements
                      ";
           }
           elseif($potassium<=3.5 and $potassium>0){
             echo "POSSIBLE DIAGNOSIS:
                   Hypokalemia
                  POSSIBLE INTERVENTIONS:
                  IV potassium
                  Oral medication
                    ";
           }elseif($potassium>=6.1){
             echo "POSSIBLE DIAGNOSIS:
                   Hyperkalemia
                  POSSIBLE INTERVENTIONS:
                  IV glucose insulin
                  Administer Epinephrine and Albuterol ";
           }else{
             echo "";
           }
           if($chloride<80 and $chloride>0){
             echo "POSSIBLE DIAGNOSIS:
                   Hypochloremia
                   Emphysemia
                   Alkalosis
                  POSSIBLE INTERVENTIONS:
                  IV normal saline solution
                      ";
           }
           elseif($chloride>=120){
             echo "POSSIBLE DIAGNOSIS:
                   Hyperchloremia
                   Diabetes insipidus
                   Diuretic drugs
                   POSSIBLE INTERVENTIONS
                   IV
                   Stop certain medications ";
           }
           else{
             echo "";
           }
         }
      diagnosis();

        }
      ?>
    </textarea>
  </div>
</div>
</div>
</section>
</body>
</main>
<script type="text/javascript">
    $(document).ready(function () {

        function onchange() {
            //Since you have JQuery, why aren't you using it?
            var box1 = $('#getdiag');
            var box2 = $('#diagn');
            box2.val(box1.val());
        }
        $('#getdiag').on('change', onchange);
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
