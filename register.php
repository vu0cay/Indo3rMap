<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>REGISTER</h1>
    <!-- form dang ky gom (username, mail, password, confirm password) -->
     <!-- su dung phuong thuc POST, action den chinh' no (PHP_SELF) -->
      <!-- htmlspecialchars() ma hoa ky tu ve html entity tranh bi tiem script doc XSS attack. -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        User name: <input type="text" name ="uname"><br>
        Mail: <input type="text" name="mail"><br>
        Password: <input type="password" name="pass"><br>
        Cofirm password: <input type="password" name="conf_pass"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <!-- nut quay ve trang dang nhap -->
    <form method="get" action="login.php"> <input type="submit" value="back"> </form>
    <?php
    // kiem tra nguoi dung da thuc hien submit du lieu chua, khi user an submit form se~ gui 1 request phuong thuc post den server
    // vi vay khi POST co gia tri thi nguoi dung da nhap du lieu
    // dung phuong thuc $_POST['name'] name tren input form tuong ung, de lay input cua user.
        if (isset($_POST['submit'])) {
            
            $uname = $_POST["uname"];
            $upass = $_POST["pass"];
            $uconf_pass = $_POST["conf_pass"];
            $uemail = $_POST["mail"];
            
            // dung PDO (PHP Data Object) de thao tac voi Database MySQL
            $suser = "root";
            $spass = "hoangvu016260";

            $con = new PDO("mysql:host=localhost;dbname=myDB", $suser, $spass);
            try {
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt = $con->prepare("insert into Useraccount (username, email, password) values(
                                      :username, :email, :password);");
                $stmt->bindParam(':username',$uname);
                $stmt->bindParam(':password',$upass);
                $stmt->bindParam(':email',$uemail);

                $stmt->execute();

                echo "<script>alert('Welcome".htmlspecialchars($uname)."')</script>";
                header('Location: login.php');
            } 
            catch (PDOException $e) {
                echo "". $e->getMessage() ."";
            }
            
        } 
    ?>
</body>
</html>