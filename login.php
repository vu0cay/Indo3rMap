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
  
  <h1>INDO3R</h1>
<!-- form nhap lieu (uname, password) -->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <input class="input" type="text" id="uName" name="uName" placeholder="Username"><br>
  <br>
  <input class="input" type="password" id="pass" name="pass" placeholder="Password"><br>
  <br>
  <input class="priButton" type="submit" value="Login"></input>
  </form>
  <h2>OR</h2>
  <!-- tao tai khoan -->
  <form method="get" action="register.php">
  <button class="secButton">Create account</button><br>
  </form>
  <br>
  <!-- lay lai mat khau -->
  <form method ="get" action="getPass.php">
  <button class="secButton">Forgot password?</button><br>
  </form>
  </div>
  <?php
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uname = $_POST['uName'];
    $pass = $_POST['pass'];
    
    $suser = "root";
    $spass = "hoangvu016260";
    try {
      $con = new PDO("mysql:host=localhost;dbname=myDB", $suser, $spass);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Dung prepare() de tao script thao tac voi MySQL
      $stmt = $con->prepare("select username, email, password from useraccount;");
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      
      // Kiem tra neu tai khoan hoac email va mat khau nguoi dung nhap co tren CSDL
      $checkAcc = 0;
      foreach(new RecursiveArrayIterator($stmt->fetchAll(PDO::FETCH_ASSOC)) as $row) {
        if (($row["username"] == $uname || $row["email"] == $uname) && $row['password'] == $pass) {
          $checkAcc = 1;
        }
      }
      
      if( $checkAcc == 1) {           // dang nhap thanh cong
          $_SESSION['uname'] = $uname;
          header("Location: ./IndrMap/index.php");
      } else {
        echo "<script>alert('Login Fail. Please try again!');</script>";      // dang nhap khong thanh cong
      }
    } 
    catch (PDOException $e) {                     // bat loi trong qua trinh thao tac voi MySQL
      echo "". $e->getMessage();
    }
  }


  
  ?>
  </body>
</html>