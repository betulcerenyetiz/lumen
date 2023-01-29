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
                            <div class="card-header">
                                <strong>Add a work</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="workName" class=" form-control-label">Work Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="workName" name="workName" placeholder="Write a name for the job" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="city" class=" form-control-label">City</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="city" name="city" placeholder="Write the city where the job is located" class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="category" class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="category" id="category" class="form-control-sm form-control">
                                                <option value="">Please select</option>
                                                <option value="Company">Company</option>
                                                <option value="House">House</option>
                                            </select></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9"><textarea name="description" id="description" rows="9" placeholder="Description..." class="form-control"></textarea></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>

                                </form>
                                <?php
                                    if ($_POST){
                                        $name = $_POST["workName"];
                                        $city = $_POST["city"];
                                        $category = $_POST["category"];
                                        $description =$_POST["description"];

                                        $addproject = $connection->query("insert into ourworks(work_name,work_city,category,description) values('$name','$city','$category','$description')");
                                        if($addproject){
                                            echo '<script>alert("User added!");</script>';
                                        }
                                        else{
                                             echo '<script>alert("Something is wrong!");</script>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                </div>
                
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Our Works Datas</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Work Name</th>
                                        <th scope="col">Work City</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Edit/Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $list=$connection->query("select * from ourworks ORDER BY id DESC");
 
                                    while($data=$list->FETCH_ASSOC()){
                                        $id=$data["id"];
                                        $name = $data["work_name"];
                                        $city = $data["work_city"];
                                        $category= $data["category"];
                                        $description = $data["description"];

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $name;?></th>
                                        <td><?php echo $city;?></td>
                                        <td><?php echo $category;?></td>
                                        <td><?php echo $description;?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?php echo $id;?>"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="delete.php?id=<?php echo $id;?>&table=ourworks"><i class="fa fa-trash fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }

                                    ?>
                                </tbody>
                            </table>
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
