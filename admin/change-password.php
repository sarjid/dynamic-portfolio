<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php
   $userid   = session::get('userId');
   $userrole = session::get('userRole');
?>

<?php

$qeury = "SELECT * FROM tbl_users WHERE id ='$userid'";
        $result = $db->select($qeury);
      
		if ($result !== false) {
            while ($row = mysqli_fetch_assoc($result)) {
            $dbPassword = $row['password'];
	

            }}


?>


     <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href=" {{route('dashboard')}} ">Dashboard</a></li>

                            <li><i class="" aria-hidden="true"></i><a href=" {{route('dashboard')}} ">Settings</a></li>
                            <li><i class="" aria-hidden="true"></i><a href=" {{route('dashboard')}} ">Change-Password</a></li>

                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=MainSection=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">
                                    
                                    <div class="row">
                                        <div class=" text-center">
                                            <h4>Change Password</h4>
                                            <hr> 
                                            <hr>
                                        </div>
                                        <!-- <div class="col-xs-6 text-right">
                                            <a href="" class="btn btn-primary">All Brand</a>

                                        </div> -->
                                    </div>
                    <div class="row">
                        <div class="col-md-12">
 			<!-- Upadate password validation  -->
             <?php
				
				if (isset($_POST['update_pass'])) {
					
					if (isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {

						$oldPassword = md5($_POST['old_password']);
						// $dbPassword = $row['password'];  
						if ($oldPassword == $dbPassword) {
							if (strlen($_POST['new_password']) >= 6) {
								if ($_POST['new_password'] == ($_POST['c_password'])) {
									$password = md5($_POST['new_password']);
									
										}else {
											$conpassdError ='<strong style="color: red;">Password Not Same..!</strong>';
										}
									}else {
										$passwordError = '<strong style="color: red;">Password Must Be longer then 6 Characters..</strong>';
									}
						}else {
							$oldpassError = '<strong style="color: red;">Your Old password Not Match..</strong>';
						}

						
					}else {
						$passwordError = '<strong style="color: red;">Please Input Password</strong>';
				}

				// update password into database 

				if (isset($password)) {
                    $sql = "UPDATE tbl_users SET password = '$password' WHERE id ='$userid' ";
                    $updated_rows = $db->update($sql);
					if ($updated_rows) {
						$passError = '<h3 style="color: green;">Password Change Succesfully</h3>';
						?>
							<script>
									function myfunction() {
										location.reload();
									}
							</script>

						<?php
					}else {
						$passError = '<h3 style="color: red;">Opps.! Something Erro</h3>';
					}

				}

			}

						
        ?>  
         <?php if (isset($passError)) {
                        echo $passError;
                            }?>
                    </div>       
            <form class="form-horizontal" action=" " method="POST">
                  <!-- Old Password                             -->
                   <div class="form-group">
                   <label for="brand_name" class="col-sm-3 control-label">Old Password</label>
                    <div class="col-sm-9">
                     <input type="password" class="form-control" name="old_password" value="" placeholder="old password"  data-validation="required">
                     <?php if (isset($oldpassError)) {
                        echo $oldpassError;
                            }?>

                    </div>
                    </div>

                    <!-- new password  -->
                    <div class="form-group">
                   <label for="new_password" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-9">
                     <input type="password" id="new_password" class="form-control" name="new_password" value="" placeholder="New password"  data-validation="required">
                    </div>
                    <?php if (isset($passwordError)) {
                        echo $passwordError;
                            }?>
                    </div>

                    <!-- confirm password  -->
                    <div class="form-group">
                   <label for="new_password" class="col-sm-3 control-label">Cofirm Password</label>
                    <div class="col-sm-9">
                     <input type="password" id="new_password" class="form-control" name="c_password" value="" placeholder="Confirm password"  data-validation="required">
                    </div>
                    <?php if (isset($ConpasError)) {
                        echo $ConpassError;
                            }?>
                    </div>

                     <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                 <button type="submit"  name="update_pass" class="btn btn-primary">Change</button>
                          </div>
                        </div>
                      </form>
                    </div>
                 </div>
                 </div>
                            </div>
                        </div>
                        <!--STRIPE-->
                    </div>



                    </div>

                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>

<?php include 'inc/footer.php'; ?>