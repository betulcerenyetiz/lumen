<?php
    include("../inc/db.php");
    $referer = $_SERVER["HTTP_REFERER"];
    if($referer==""){
        header("Location: exit.php");
    }
?>
<!doctype html>
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lumen Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/favicon.png">
    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="homepage.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li><a href="addauser.php"><i class="menu-icon fa fa-users"></i>Add a user</a></li>
                    <li><a href="datas.php"><i class="menu-icon fa fa-table"></i>Our Works's Datas</a></li>
                    <li class="active"><a href="mails.php"><i class="menu-icon fa fa-paper-plane"></i>Mails</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">


                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>

                        <div class="user-menu dropdown-menu bg-dark">
                             <a class="nav-link" href="exit.php" style="color:white;"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="container">
                <div class="card">
                            <div class="card-header">
                                <strong>Send a Mail</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textName" class=" form-control-label">Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="textName" name="textName" placeholder="Name" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="txtEmail" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="txtEmail" name="txtEmail" placeholder="Enter Email" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="txtSubject" class=" form-control-label">Message Subject</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="txtSubject" name="txtSubject" placeholder="Subject" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="txtMessage" class=" form-control-label">Message Body</label></div>
                                        <div class="col-12 col-md-9"><textarea name="txtMessage" id="txtMessage" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
               
               
                <?php
                //send a mail
                if ($_POST){
                  require("../PHPMailer/src/Exception.php");
                  require("../PHPMailer/src/PHPMailer.php");
                  require("../PHPMailer/src/SMTP.php");
                
                    $mail = new PHPMailer\PHPMailer\PHPMailer();
                    $mail->IsSMTP(); // enable SMTP
  
                  try {
                      //Server settings
                      $mail->SMTPDebug = 2;
                      $mail->Host      = 'smtp.gmail.com';
                      $mail->SMTPAuth   = true;
                      $mail->CharSet    ="utf-8";
                      $mail->Username   = 'lumennpainting@gmail.com';
                      $mail->Password   = 'loriaiovuagxjxuu';
                      $mail->SMTPSecure = 'ssl';
                      $mail->Port       = 465;
  
                      //Recipients
                      $mail->setFrom('lumennpainting@gmail.com');
                      $mail->addAddress($_POST["txtEmail"], $_POST["txtName"]);
  
                      //Content
                      $mail->isHTML(true);
                      $mail->Subject = htmlspecialchars("Lumen Painting-Plaster | ".$_POST["txtSubject"]);
                      $mail->Body    = htmlspecialchars($_POST["txtMessage"]);
  
                      $mail->send();
                      echo '<script>alert("Message has been sent");</script>';
                      $mail->ClearAddresses();
                      $mail->ClearAttachments();
                      echo "<script>
                      window.location.href='mails.php';
                      </script>";
                  } catch (Exception $e) {
                      echo '<script>alert("Message could not be sent.");</script>';
                  }
                }
                  
              ?>
              
                     <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Inbox</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                                $list=$connection->query("select * from contact ORDER BY sendDate DESC");
                                                while($data=$list->FETCH_ASSOC()){
                                                    $name = $data["fullName"];
                                                    $email = $data["email"];
                                                    $subject= $data["subject"];
                                                    $message = $data["message"];
                                                    $date = $data["sendDate"];
                                                
                                            ?>
                                        <tr>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $subject;?></td>
                                            <td><?php echo $message;?></td>
                                            <td><?php echo $date;?></td>
                                        </tr>
                                        <?php
                                                 }

                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->

    </div>
    <!-- /#right-panel -->
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>

</body>
</html>
