<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laboratory</title>
  <link rel="stylesheet" href="./css/chat.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/chat.js"></script>
    <link rel="stylesheet" href="./css/lab.css" type="text/css" />
    <script type="text/javascript">
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
    </script>
</head>
<body onload="setInterval('chat.update()', 1000)">
  <header>
<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"><path fill="#0099ff" fill-opacity="0.95" d="M0,160L1440,0L1440,0L0,0Z"></path></svg> -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100"><path fill="#0099ff" fill-opacity="0.95" d="M0,32L720,96L1440,32L1440,0L720,0L0,0Z"></path></svg>

    <div class="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="secretarylogin.php">Patient</a></li>
        <li><a href="nurselogin.php">Vitals</a></li>
        <li class="active"><a href="#">Laboratory</a></li>
        <li><a href="doctorlogin.php">Diagnose</a></li>
      </ul>
    </div>
  </header>
  <section>
    <div class="leftside">
      <div class="chat">
  <h3> PATIENT TO TEST</h3>
  <div id="page-wrap">
      <p id="name-area"></p>
      <div id="chat-wrap"><div id="chat-area"></div></div>
      <form id="send-message-area">
          <p>Your message: </p>
          <textarea id="sendie" maxlength = '100' ></textarea>
      </form>
  </div>
</div>
<div class="search">

  <p>
  <label>Search patient</label>
  <input  type="text" placeholder="Patient name" name="search" id="searchQuery">
  <button id="submitSearch">Search</button></p>
  <p id="resultMsg"></p>
</div>
</div>

<div class="rightside">
  <form class="form" action="<?php $PHP_SELF;?>" method="post">
    <h3>RECORD TESTS</h3>
    <p><label>Patient ID</label>
      <input type="text" name="patid" id="patid" required></p>
      <p><label>Lab specialist ID</label>
        <input type="text"name="labid" value="<?php echo $_SESSION['USER_ID']; ?>" required></p>
      <p><label>Sodium (mEq/Litre)</label>
        <input type="number" name="sodium" min="50" max="200" value="140"></p>
        <p><label>Ionized Calcium (mEq/Litre)</label>
        <input type="float" name="calcium" value="4.00"></p>
        <p><label>Potassium (mEq/Litre)</label>
        <input type="float" name="potassium" value="4.0"></p>
        <p><label>Chloride (mEq/Litre)</label>
        <input type="number" name="chloride" min="10" max="200" value="100"></p>
        <p><label>Carbon dioxide (mEq/Litre)</label>
        <input type="number" name="carbon" min="0" max="100" value="22"></p>
        <p><label>Blood Urea Nitrogen (mg/dL)</label>
        <input type="number" name="bun" min="0" max="100" value="16"></p>
        <p><label>Creatinine (mg/dL)</label>
        <input type="float" name="creatinine" value="1.00"></p>
        <p><label>Blood sugar (mg/dL)</label>
        <input type="number" name="sugar" min="50" max="200" value="120"></p>
        <p><label>White blood cells (Kcells/microliter)</label>
        <input type="float" name="wbc" value="10.0"></p>
        <p><label>Haemoglobin (g/dL)</label>
        <input type="number" name="hmb" min="0" max="50" value="15"></p>
        <p><label>Hematocrit (%)</label>
        <input type="number" name="hema" min="0" max="100" value="45"></p>
        <p><label>Platelets (K/microliter)</label>
        <input type="number" name="platelets" min="100" max="400" value="275"></p>
        <p><label>PaO<sub>2</sub> (mm/Hg)</label>
        <input type="number" name="pao" min="10" max="300" value="100"></p>
        <p><label>PaCO<sub>2</sub> (mm/Hg)</label>
        <input type="number" name="paco" min="10" max="100" value="40"></p>
        <p><label>pH</label>
        <input type="float" name="ph" value="7.4"></p>
        <p><label>Bicarbonate (mEq/Litre)</label>
        <input type="number" name="bicarbonate" min="10" max="100" value="24"></p>
        <p><label>Base Excess (mEq/Litre)</label>
        <input type="number" name="base" min="0" max="100" value="50"></p>

        <button class="submitbtn" type="submit"  name="sub">Submit</button>
        <button class="clearbtn" type="reset">Clear</button>

    </form>
  </div>
    <script src="./js/script.js"></script>
  </section>
</body>
<?php
if(isset($_POST["sub"])){
  $patient=$_POST['patid'];
  $labtech=$_POST['labid'];
  $sodium=$_POST['sodium'];
  $calcium=$_POST['calcium'];
  $potassium=$_POST['potassium'];
  $chloride=$_POST['chloride'];
  $carbon=$_POST['carbon'];
  $bun=$_POST['bun'];
  $creatinine=$_POST['creatinine'];
  $sugar=$_POST['sugar'];
  $wbc=$_POST['wbc'];
  $haemoglobin=$_POST['hmb'];
  $hematocrit=$_POST['hema'];
  $platelets=$_POST['platelets'];
  $pao=$_POST['pao'];
  $paco=$_POST['paco'];
  $ph=$_POST['ph'];
  $bicarbonate=$_POST['bicarbonate'];
  $base=$_POST['base'];
$conn=new mysqli("localhost","root","","medical");
if($conn->connect_error){
  die("Connection failed".$conn->connect_error);
}
else{
$stmt=$conn->prepare("INSERT INTO labs(PATIENT_ID, SODIUM, IONIZED_CALCIUM,POTASSIUM,CHLORIDE, CARBON_DIOXIDE, BUN, CREATININE, BLOOD_SUGAR, WHITE_BLOOD_CELLS, HAEMOGLOBIN, HEMATOCRIT, PLATELETS, PaO2, PaCO2, pH, BICARBONATE, BASE_EXCESS,LABTECH_ID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("iiddiiididddiiidiii",$patient,$sodium,$calcium,$potassium,$chloride,$carbon,$bun,$creatinine,$sugar,$wbc,$haemoglobin,$hematocrit,$platelets,$pao,$paco,$ph,$bicarbonate,$base,$labtech);
$stmt->execute();
echo "Registration succesful";
$stmt->close();
$conn->close();
  }
}
 ?>

  </html>
