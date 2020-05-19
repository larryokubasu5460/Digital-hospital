<!DOCTYPE html>
<html>
<head>
<title>MY LOG IN FORM </title>
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
<div class="login-box">
<h1> Login </h1>
<form action="validation.php" method="post">
<div class="textbox">
  <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" placeholder="Username" name="name"  required>
  </div>
<div class="textbox">
  <i class="fa fa-lock" aria-hidden="true"></i>
  <input type="password" placeholder="Password" name="pass"  required>
  </div>
Not yet registered?
<a href="registration.php" class="form_link">Register Here</a><br><br>
<button class="btn" type="submit" name="sub">Sign in </button>

</form>

</body>
</html>
