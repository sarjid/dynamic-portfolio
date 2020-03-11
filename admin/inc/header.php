<?php 
    include '../lib/session.php';
    session::checksession();
?>

<?php 

include '../lib/Database.php';
include '../config/config.php';
include '../helpers/format.php';

?>
<?php 
	$db = new Database;
	$frmt = new Format;
	
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>

<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Panel</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets//android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
     <!--load progress bar-->
     <script src="assets/vendor/pace/pace.min.js"></script>
    <link href="assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">

    <!--dataTable-->
    <link rel="stylesheet" href="assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!-- dataTable Columns hiding responsive-->
    <link rel="stylesheet" href="assets/vendor/data-table/extensions/Responsive/css/responsive.bootstrap.min.css">
    <script src="assets/javascripts/examples/tables/data-tables.js"></script>

      <!--dataTable-->
      <link rel="stylesheet" href="assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
   


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <!-- <img alt="logo" src="assets/images/header-logo.png" /> -->
                        <h3  style="color:white;">Admin Panel</h3>
                    </a>
                </div>
                

                <div class="logo">
                    
                    <a href="../index.php" target="_blank" class="on-click">
                       
                        <h5>Visit WebSite</h5>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">
               
                    <!--messages-->
                    <div class="notice" id="messages-notice">
                        <i class="fa fa-comments-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"><i class=""><?php 
						$sqll = "SELECT * FROM messages WHERE status = '0' ORDER BY id DESC";
						$msg = $db->select($sqll);
						if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo $count;
                        }else{
                            echo "";
                        }					
						
					?></i></span>
                        </i>
                        <div class="dropdown-box basic">
                            <div class="drop-header ">
                                <h3><i class="fa fa-comments" aria-hidden="true"></i> Messages</h3>
                                <span class="badge x-danger b-rounded"><?php 
						$sqll = "SELECT * FROM messages ORDER BY id DESC";
						$msg = $db->select($sqll);
						if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo $count;
                        }else{
                            echo "";
                        }					
						
					?></span>
                            </div>
                            <?php 
						$qeury = "SELECT * FROM messages WHERE status = '0' ORDER BY id DESC ";
						$result = $db->select($qeury);
						if ($result !== false) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;								
						
					?>
                            <div class="drop-content">
                                <div class="widget-list list-left-element">
                                    <ul>
                                        <li>
                                            <a href="viewmsg.php?id=<?php echo $row['id']; ?> " >
                                                <div class="left-element"><img alt="profile photo" src="assets/images/avatar/message.png" /></div>
                                                <div class="text">
                                                    <span class="title"><?php echo $row['name'] ?></span>
                                                    <span class="subtitle"><?php echo $frmt->textshorten( $row['message'],25); ?></span>
                                                </div>
                                            </a>
                                      
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php }}?>   
                            

                            <div class="drop-footer">
                                <a href="allmsg.php">See all messages</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="assets/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">Sarjid Islam</span>
                            <span class="user-profile"> <?php  if (isset($_SESSION['username'])) {
                               echo $_SESSION['username'];
                            } 
                             ?></span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            
                                <li><a href="change-password.php"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out " aria-hidden="true"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
               
              
                 
            </div>
            </div>
        </div>

              <!-- page BODY -->
              <div class="page-body">
       
       

