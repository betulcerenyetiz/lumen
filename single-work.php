<?php
    include("inc/db.php");
?>
<!doctype html>
<html lang="en-gb" class="no-js">
  <head>
    <meta charset="utf-8">
	<title>Lumen Painting & Plaster</title>
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">		
		
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="apple-touch-icon" href="admin/images/favicon.png">
    <link rel="shortcut icon" href="admin/images/favicon.png">

     <!--styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" href="css/etlinefont.css">
    <link href="css/style.css" type="text/css"  rel="stylesheet"/>


   <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    
	<body  data-spy="scroll" data-target="#main-menu">
 

  <!--Start Page loader -->
  <div id="pageloader">   
    <div class="loader">
      <img src="images/progress.gif" alt='loader' />
    </div>
</div>
<!--End Page loader -->

  
<!--Start Navigation-->
    <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--Start Logo -->
                        <div class="logo-nav">
                            <a href="index.php">
                                <img style="width:160px;" src="images/logo.png" alt="Company logo" />
                            </a>
                        </div>
                        <!--End Logo -->
                        <div class="clear-toggle"></div>
                        <div id="main-menu" class="collapse scroll navbar-right">
                            <ul class="nav">
                            
                                <li class="active"> <a href="#home">Home</a> </li>
                                
                                <li> <a href="index.php#about">About</a> </li>
                                
                                <li> <a href="index.php#works">Our Work</a> </li>
                                
                                <li> <a href="index.php#services">Services</a> </li>
                                                                    
                                <li> <a href="index.php#why-choose">Why Choose Us?</a></li>
                                 
                                <li> <a href="index.php#contact">Contact</a> </li>
                                    
                            </ul>
                        </div><!-- end main-menu -->
                    </div>
                </div>
            </div>
        </header>
<!--End Navigation-->
                        <?php
                            if($_GET){
                                $id = (int)$_GET["id"];
                                $work = ($connection->query("select * from ourworks WHERE id=$id"))->FETCH_ASSOC();
                                $name = $work["work_name"];
                                $city = $work["work_city"];
                                $category = $work["category"];
                                $description = $work["description"];
                            }
                        ?>
		<!--start page-header -->
		<section id="page-header" class="parallax">
             <div class="overlay"></div>
			<div class="container">
				<h1><?php echo $name; ?></h1>
                <!--Start Breadcrumb-->
                <div class="breadcrumb">
					<ul>
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="index.php#works">Our Works</a>
						</li>
						<li class="current">
							<a href="single-work.php?id=<?php echo $id; ?>">Project details</a>
						</li>
					</ul>
				</div>
                <!--End Breadcrumb-->
			</div>
		</section>
		<!--End page-header -->
		
		<!--Start single-work -->
		<section id="single-work" class="section">
			<div class="container">
				<div class="row">					
					<div class="col-md-7">						
						<div id="single-work-slider" class="owl-carousel owl-theme">
                            <?php
                                $pList=$connection->query("select * from pictures WHERE id = $id");
                                while($pdata=$pList->FETCH_ASSOC()){
                                    $picture=$pdata["picture"];
                            ?>
							<div class="item"><img src="images/works/<?php echo $picture;?>" alt=""></div>
                            <?php
                                }
                            ?>					 
						</div>	
					</div>
                    
                    <!--Start Work Detail-->
					<div class="col-md-5 work-detail">
                            <h3 class="margin-bottom-15">Work Description </h3>	
						<p><?php echo $description; ?> </p>					
						 
						<ul class="work-detail-list">
							<li><span>Category :</span><?php echo $category; ?></li>
							<li><span>City :</span><?php echo $city; ?></li>
						</ul>
                        
					</div>
                    <!--End Work Detail-->
				</div> <!--/ row-->
			</div> <!--/ container-->		
		</section>
		<!--End single-work -->
		


   <!--Start Footer-->
   <footer>
       <div class="container">
           <div class="row">
               <!--Start copyright-->
               <div class="col-md-6 col-sm-6 col-xs-6">
                   <div class="copyright"><p>Copyright © 2022 All Rights reserved by: <a href="#">betulcerenyetiz</a>
                 </p></div>
               </div>
               <!--End copyright-->
               
               <!--start social icons-->
               <div class="col-md-6 col-sm-6 col-xs-6">
                   <div class="social-icons">
                   <p><a href="https://www.instagram.com/lumenpainting/"><i class="fa fa-instagram"></i> lumenpainting</a></p>
                    </div>
               </div>
               <!--End social icons-->
           </div> <!-- /.row-->
       </div> <!-- /.container-->
   </footer>
   <!--End Footer-->

   <a href="#" class="scrollup"> <i class="fa fa-chevron-up"> </i> </a>

    <!--Plugins-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/jquery.easypiechart.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    
 </body>
</html>

