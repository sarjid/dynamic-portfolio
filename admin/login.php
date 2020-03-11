<?php 
include '../lib/session.php';
include '../config/config.php';
	session:: init();
include '../lib/Database.php';
include '../helpers/format.php';

?>

<?php 
	$db = new Database;
	$frmt = new Format;
	
?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin Login</title>
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="text-center">
           <h2>Admin Login</h2>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                <?php 
		if (isset($_POST['login'])) {
			if (isset($_POST['username']) && !empty($_POST['username'])) {

				$pattern = '/^[a-zA-Z\s]*$/';
				if (preg_match($pattern, $_POST['username'])) {
					$username = $_POST['username'];
					
				}else {
					
					$nameError = '<strong style="color: red;">Please Input Only Lower And Uppercase..!</strong>';
				}
	
			}else {
				$nameError = '<strong style="color: red;">Please Input Your Username..!</strong>';
				
			}

			// Password Validation in php 

			if (isset($_POST['password']) && !empty($_POST['password'])) {
				
				$password = md5($_POST['password']);
			}else {
				$passError = '<strong style="color: red;">Please Input Your Password..!</strong>';
			}

			// Get Data from database 

			if (isset($username) && isset($password)) {

				$sql = "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' ";
				
				$result = $db->select($sql);

				if ($result !== false) {
					  
					$value = mysqli_fetch_assoc($result);
					
						session::set("login", true);
						session::set("username", $value['username']);
						session::set("userId", $value['id']);
						session::set("userRole", $value['role']);
						header("location: index.php");
						
					
					
				}else {
					$passError = '<strong style="color: red;">Wrong Username Or Password...!</strong>';
				}
				
			}


			
		}
	?>
                    <form action="" method="post">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="email" value="<?php if(isset($username)) echo $username ?>" name="username" placeholder="Username">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            
                        </div>
                        <?php  if (isset($nameError)) {
					echo $nameError;
				} ?>
			<div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <?php  if (isset($passError)) {
					    echo $passError;
			        	} ?>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                          
                        </div>
                        <hr/>
                        <div class="form-group text-center">
                            <a href="forgot-pass.php">Forgot password?</a>
                          
                             
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="assets/javascripts/template-script.min.js"></script>
<script src="assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->

</body>

</html>
