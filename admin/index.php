<?php
include("../inc/db.php");
    if($_POST){
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        
        $sorgu= $connection->query("select * from user where (userName='$userName' && password='$password')");
        $kayit = $sorgu->num_rows;

        if($kayit>0){
            setcookie("user","$userName","1",time()*60*60);
            $_SESSION["login"] = sha1(md5("true"));
            $_SESSION["loginbase"] = sha1(md5("on"));
            echo "<script>
                    window.location.href='homepage.php';
                </script>";
        }else{
            echo "<script>
                    alert('Username or password is incorrect!');
                    window.location.href='index.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumen Admin Panel | Login</title>

    
    <link rel="apple-touch-icon" href="images/favicon.png">
    <link rel="shortcut icon" href="images/favicon.png">
    	<!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!--styles -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="../js/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="../js/owl-carousel/owl.theme.css" rel="stylesheet">
        <link href="../js/owl-carousel/owl.transitions.css" rel="stylesheet">
        <link href="../css/magnific-popup.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/etlinefont.css">
        <link href="../css/style.css" type="text/css"  rel="stylesheet"/>
</head>
<body>
    <div class="container">
    <br><br><br><br><br>
        <div class="row "  >
            <div class="col-sm-8 col-sm-offset-2 px-1" style="border: 2px solid grey;">
                <br><br>
                <h1>Lumen P&P Admin Panel</h1>
                <br>
                <form action="" method="POST">
                    <h4>User Name:</h4>
                    <input type="text" name="userName" style="color:black;" require>
                    <h4>Password:</h4>
                    <input type="password" name="password" style="color:black;"  require> <br><br>
                    <input type="submit" class="btn btn-primary">
                </form> 
                <br><br>
            </div>
        </div>
        
    </div>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
</body>
</html>