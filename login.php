<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="./styles.css">

  </head>
  
  <body>
  <div>
  
  <h1>LOGO</h1>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <input class="input" type="text" id="uName" name="uName" placeholder="Username"><br>
  <br>
  <input class="input" type="password" id="pass" name="pass" placeholder="Password"><br>
  <br>
  <input class="priButton" type="submit" value="Login"></input>
  </form>
  <h2>OR</h2>
  <form>
  <button class="secButton">Forgot password?</button><br>
  <br>
  <button class="secButton">Create account</button><br>
  </form>
  </div>
  <?php
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$uname = $_POST['uName'];
	$pass = $_POST['pass'];
	
	if ($uname == ''|| $pass == '') { 
		return;
	} else if($uname == 'admin' && $pass == '123') {
		$_SESSION['uname'] = $uname;
		header("Location: ./IndrMap/index.php");
	} else {
		echo '<script>alert("Login Fail")</script>';
	}
  }
  ?>
  </body>
</html>