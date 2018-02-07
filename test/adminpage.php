<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION['mem_id'] == "")
	{
		echo "You don't have permission!";
		exit();
	}

	if($_SESSION['active'] != "Yes")
	{
		echo "This page for Admin only!";
		exit();
	}

	mysql_connect("localhost","hubber_sayhimem","sayhimem");
	mysql_select_db("hubber_sayhimem");
	$strSQL = "SELECT * FROM member WHERE mem_id = '".$_SESSION['mem_id']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
  //print_r($_SESSION);
  //echo $_SESSION['username'];
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/superlist.css" rel="stylesheet" type="text/css" >

    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.png">

    <title>Superlist - Admin Dashboard</title>
</head>


<body class="">

<div class="page-wrapper">

    <header class="header header-minimal">
    <div class="header-wrapper">
        <div class="container-fluid">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="assets/img/logo.png" alt="Logo">
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-bottom">
                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
    <li >
        <a href="https://adsayhi.com/dashboard.php">Home </a>


    </li>



    <li>
        <a href="#">Admin </i></a>


    </li>

    <li >
        <a href="#">Contact </i></a>

    </li>
</ul>

<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>


                        <div class="header-nav-user">
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <div class="user-image">
                <img src="assets/img/tmp/agent-2.jpg">
                <div class="notification"></div><!-- /.notification-->
            </div><!-- /.user-image -->

            <span class="header-nav-user-name">  <?echo $_SESSION['name'];?></span> <i class="fa fa-chevron-down"></i>
        </button>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="listing-submit.html">Submit Listing</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </div><!-- /.dropdown -->
</div><!-- /.header-nav-user -->

                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-wrapper -->

    <div class="header-statusbar">
        <div class="header-statusbar-inner">
            <div class="header-statusbar-left">
                <h1>Dashboard</h1>


            </div><!-- /.header-statusbar-left -->


        </div><!-- /.header-statusbar-inner -->
    </div><!-- /.header-statusbar -->
</header><!-- /.header -->




    <div class="main">
        <div class="outer-admin">
            <div class="wrapper-admin">
                <div class="sidebar-admin">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-file"></i></a></li>
                        <li><a href="#"><i class="fa fa-pencil"></i></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i></a></li>
                    </ul>
                </div><!-- /.sidebar-admin-->

                <div class="sidebar-secondary-admin">
                    <ul>
                        <li class="active">
                            <a href="admin-dashboard.html">
                                <span class="icon"><i class="fa fa-tachometer"></i></span>
                                <span class="title">Dashboard</span>
                                <span class="subtitle">Manage your website</span>
                            </a>
                        </li>

                        <li >
                            <a href="listform.php">
                                <span class="icon"><i class="fa fa-i-cursor"></i></span>
                                <span class="title"> Forms  </span>
                                <span class="subtitle">Listing information</span>
                            </a>
                        </li>

                    </ul>
                </div><!-- /.sidebar-secondary-admin -->

                <div class="content-admin">
                    <div class="content-admin-wrapper">
                        <div class="content-admin-main">
                            <div class="content-admin-main-inner">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-12">

											<form method="get" action="?" class="filter-sort">
									        <div class="form-group">
									            <select title="Sort by">
									                <option name="price">Price</option>
									                <option name="rating">Rating</option>
									                <option name="title">Title</option>
									            </select>
									        </div><!-- /.form-group -->

									        <div class="form-group">
									            <select title="Order">
									                <option name="ASC">Asc</option>
									                <option name="DESC">Desc</option>
									            </select>
									        </div><!-- /.form-group -->
									    </form>
    <div class="row">
        <div class="col-sm-12">
            <div class="message">

								<?
								include('connect.php');
								$sql = "SELECT * FROM listing ";
								$strSQL = mysql_query($sql) or die(mysql_error());
								$Rsql = mysql_fetch_array($strSQL);
								//$rows = mysql_num_rows($Rsql);
								$num_rows = mysql_num_rows($strSQL);
								//for($i=0;$i<mysql_num_rows($strSQL);$i++){ ?>

              <p> จำนวน listing ทั้งหมด ในระบบ	&nbsp;&nbsp;&nbsp;<? echo $num_rows; ?></p>
            </div><!-- /.message -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->

		<?
		include('connect.php');
		$sql = "SELECT * FROM listing  ";
		$strSQL = mysql_query($sql) or die(mysql_error());
		$Rsql = mysql_fetch_array($strSQL);
		//$rows = mysql_num_rows($Rsql);
		$num_rows = mysql_num_rows($strSQL);
		for($i=0;$i<mysql_num_rows($strSQL);$i++){
		//echo $strSQl;
	//print_r ($Rsql);
		//echo $Rsql['img_name1'];
		//var_dump($Rsql[img_name]);
?>
		<div class="cards-row">

		        <div class="card-row">
		            <div class="card-row-inner">


		                </div><!-- /.card-row-image -->

                    <div class="card-row-body">
		                    <h2 class="card-row-title"><a href="listing-detail.html"><? echo mysql_result($strSQL,$i,"adname" ) ; ?></a></h2>
												<div class="card-row-content"><p>รหัส listing : <? echo mysql_result($strSQL,$i,"listing_id"); ?></p></div>
		                    <div class="card-row-content"><p>คำอธิบาย : <? echo mysql_result($strSQL,$i,"addes"); ?></p></div>

		                </div><!-- /.card-row-body -->

                    <div class="card-row-body">
		                    <h2 class="card-row-title"><a href="listing-detail.html"><? echo mysql_result($strSQL,$i,"adname" ) ; ?></a></h2>
												<div class="card-row-content"><p>รหัส listing : <? echo mysql_result($strSQL,$i,"listing_id"); ?></p></div>
		                    <div class="card-row-content"><p>คำอธิบาย : <? echo mysql_result($strSQL,$i,"addes"); ?></p></div>

		                </div><!-- /.card-row-body -->

                    <div class="card-row-body">
		                    <h2 class="card-row-title"><a href="listing-detail.html"><? echo mysql_result($strSQL,$i,"adname" ) ; ?></a></h2>
												<div class="card-row-content"><p>รหัส listing : <? echo mysql_result($strSQL,$i,"listing_id"); ?></p></div>
		                    <div class="card-row-content"><p>คำอธิบาย : <? echo mysql_result($strSQL,$i,"addes"); ?></p></div>

		                </div><!-- /.card-row-body -->

                    <div class="card-row-body">
		                    <h2 class="card-row-title"><a href="listing-detail.html"><? echo mysql_result($strSQL,$i,"adname" ) ; ?></a></h2>
												<div class="card-row-content"><p>รหัส listing : <? echo mysql_result($strSQL,$i,"listing_id"); ?></p></div>
		                    <div class="card-row-content"><p>คำอธิบาย : <? echo mysql_result($strSQL,$i,"addes"); ?></p></div>

		                </div><!-- /.card-row-body -->

		            </div><!-- /.card-row-inner -->
								<div class="post-meta clearfix" style="margin: 0px 0px 0px 0px;">
													<div style="   ">




														<? if(mysql_result($strSQL,$i,"active_status")=='active'){?>
														<div class="post-meta-categories" ><?	{ echo '<span style="color:;">แสดงอยู่ใน listing</span>';} ?> </div><!-- /.post-meta-categories -->
														<? }else{ ?>

															<div class="post-meta-categories" <?	{echo '<span style="color:#F78181;">ไม่แสดงใน listing</span>';} ?> </div>
														<? } ?>
														<!-- <div class="post-meta-comments"> </div> --> <!-- /.post-meta-comments -->



													</div><!-- /.post-meta -->
                          <td class="post-meta-more">
                              <a href="activelist.php?id=<?=mysql_result($strSQL,$i,"listing_id")?>" class="btn btn-xs btn-primary">active</a>
                              <a href="nonactivelist.php?id=<?=mysql_result($strSQL,$i,"listing_id")?>" class="btn btn-xs btn-danger">non-active</a>
                          </td>
		        </div><!-- /.card-row -->


						<?}?>





		</div><!-- /.cards-row -->









</div><!-- /.col-* -->

                                    </div>
                                </div><!-- /.container-fluid -->
                            </div><!-- /.content-admin-main-inner -->
                        </div><!-- /.content-admin-main -->

                        <div class="content-admin-footer">
                            <div class="container-fluid">
                                <div class="content-admin-footer-inner">
                                    &copy; 2015 All rights reserved. Created by <a href="#">Aviators</a>.
                                </div><!-- /.content-admin-footer-inner -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.content-admin-footer  -->
                    </div><!-- /.content-admin-wrapper -->
                </div><!-- /.content-admin -->
            </div><!-- /.wrapper-admin -->
        </div><!-- /.outer-admin -->
    </div><!-- /.main -->
</div><!-- /.page-wrapper -->


<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/map.js" type="text/javascript"></script>

<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js" type="text/javascript"></script>
<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js" type="text/javascript"></script>
<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js" type="text/javascript"></script>
<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js" type="text/javascript"></script>
<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js" type="text/javascript"></script>
<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js" type="text/javascript"></script>
<script src="assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js" type="text/javascript"></script>

<script src="assets/libraries/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>

<script src="assets/libraries/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/libraries/flot/jquery.flot.spline.js" type="text/javascript"></script>

<script src="assets/libraries/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

<script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script>

<script type="text/javascript" src="assets/libraries/jquery-google-map/infobox.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-google-map/markerclusterer.js"></script>
<script type="text/javascript" src="assets/libraries/jquery-google-map/jquery-google-map.js"></script>

<script type="text/javascript" src="assets/libraries/owl.carousel/owl.carousel.js"></script>
<script type="text/javascript" src="assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>

<script src="assets/js/superlist.js" type="text/javascript"></script>

</body>
</html>
