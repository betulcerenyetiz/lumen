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
                    <li class="active"><a href="datas.php"><i class="menu-icon fa fa-table"></i>Our Works's Datas</a></li>
                    <li><a href="mails.php"><i class="menu-icon fa fa-paper-plane"></i>Mails</a></li>
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
               
            <div class="card">
                            <?php
                            if($_GET){
                                $id = (int)$_GET["id"];
                                $edit = ($connection->query("select * from ourworks WHERE id=$id"))->FETCH_ASSOC();
                                $editname = $edit["work_name"];
                                $editcity = $edit["work_city"];
                            }

                            ?>



                            <div class="card-header">
                                <strong>Add Photos</strong> 
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" name="addphoto" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">id - Work Name - Work City</label></div>
                                        <div class="col-12 col-md-9">
                                            <p class="form-control-static"><?php echo $id." - ".$editname." - ".$editcity;  ?></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Will this photo be the cover photo?</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio1" class="form-check-label ">
                                                    <input type="radio" id="inline-radio1" name="cover" value="1" class="form-check-input">Yes|
                                                </label>
                                                <label for="inline-radio2" class="form-check-label ">
                                                    <input type="radio" id="inline-radio2" name="cover" value="0" class="form-check-input">No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="photo" class="form-control-file"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </form>
                                <?php
                                    if($_POST){
                                        if($_FILES["photo"]["name"]){
                                            if($_FILES["photo"]["error"]!=0){
                                                echo '<script>alert("Something is wrong!");</script>';
                                            }else if($_FILES["photo"]["size"]>(1024*1024*3)){
                                                echo '<script>alert("File size cannot be larger than 3MB!");</script>';
                                            }else if($_FILES["photo"]["name"]!=""){
                                                $photo = strtolower($_FILES["photo"]["name"]);
                                                copy($_FILES["photo"]["tmp_name"],"../images/works/".$photo);
                                                $cover=(int)$_POST["cover"];
                                                $adding=$connection -> query("insert into pictures (id,picture,firstOne) values('$id','$photo','$cover')");
                                                if($adding){
                                                    echo '<script>
                                                    alert("Picture added!");
                                                    window.location=window.location;
                                                    </script>';
                                                }
                                                else{
                                                     echo '<script>alert("Something is wrong!");</script>';
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Photos</strong>
                                </div>
                                <div class="row">
                                    <?php
                                    $list = $connection->query("select * from pictures WHERE id=$id");
                                    while($data=$list->FETCH_ASSOC()){
                                        $picture = $data["picture"];
                                        $first = (int)$data["firstOne"];
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <img class="card-img-top" src="../images/works/<?php echo $picture;?>" alt="" style=" padding:20px 20px;  <?php if($first==1) echo 'border:solid 2px grey;'; ?>">
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->

    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

</body>
</html>
