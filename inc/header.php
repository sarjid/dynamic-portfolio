
<?php 

include 'lib/Database.php';
include 'config/config.php';
include 'helpers/format.php';

?>
<?php 
	$db = new Database;
	$frmt = new Format;
	
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Habil - Personal Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.php"navbar-brand logo-sticky-none">
                                    <?php 
		
                $query = "SELECT * FROM logos ";
               $result = $db->select($query);
        if ($result) {
            while ($getResult = mysqli_fetch_assoc($result)) {

        ?>
               <img src="admin/<?php echo $getResult ['logo']; ?>" alt="logo"/>
        <?php 			
       }
   }else {
       echo "No Data Found";
   }
   ?>
                                    </a>
                                  
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index.php">
                    <?php 
		
                 $query = "SELECT * FROM logos ";
                 $result = $db->select($query);
                 if ($result) {
                while ($getResult = mysqli_fetch_assoc($result)) {
    
    ?>
                        <img src="admin/<?php echo $getResult ['logo']; ?>" alt="logo"/>
         <?php 			
				}
			}else {
				echo "No Data Found";
			}
			?>
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                    <?php 
						$qeury = "SELECT * FROM contact WHERE id='1'";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                        <h4><?php echo $row['lives_in']; ?></h4>
                        <p><?php echo $row['address']; ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?php echo $row['phone']; ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?php echo $row['email']; ?></p>
                    </div>
                            <?php }}?>
                </div>
                <div class="social-icon-right mt-20">
                <?php 
						$qeury = "SELECT * FROM tbl_socials WHERE id='1'";
						$result = $db->select($qeury);
						if ($result !== false) {						
							while ($row = mysqli_fetch_assoc($result)) {
														
					?>
                    <a href="<?php echo $row['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $row['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $row['instagram']; ?>"><i class="fab fa-google-plus-g"></i></a>
                    <a href="<?php echo $row['descp']; ?>"><i class="fab fa-instagram"></i></a>
                            <?php }} ?>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->