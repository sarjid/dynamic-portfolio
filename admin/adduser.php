<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


     <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>

                            <li><i class="" aria-hidden="true"></i><a href=" adduser.php">User</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="adduser.php">Add User</a></li>

                        </ul>
                    </div>
                </div>
                <?php 
                    if (isset($_POST['submit'])) {

                        if (isset($_POST['username']) && !empty($_POST['username'])) {
                            
                            if (strlen($_POST['username']) >= 4) {
                               
                            
                $check_username = $_POST['username'];
              
          $sql = "SELECT username FROM tbl_users WHERE username = '$check_username' ";					
          	$result = $db->select($sql);
            if (mysqli_num_rows($result) ) {
              $usernameError = '<strong style="color: red;">Your Username Has Already Exists..!</strong>';
              
            }else {
              $username = $_POST['username'];
            }

                        
        }else {
                      $usernameError = '<strong style="color: red;">Your Username Should Be 4 Characters Or Longer Then..!</strong>';
                            
                        }
                        
                    }else {
                        $usernameError = '<strong style="color: red;">Please Input Your userName..!</strong>';
                    }


      // email validation 

  if (isset($_POST['email']) && !empty($_POST['email'])) {
   
    $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (preg_match($pattern, $_POST['email'])) {
      $check_email = $_POST['email'];
      $sql = "SELECT email FROM tbl_users WHERE email = '$check_email' ";			$result = $db->select($sql);
				if ( mysqli_num_rows($result) ) {
          $emailError = '<strong style="color: red;">Your Email Has Already Exists..!</strong>';
					
				}else {
					$email = $_POST['email'];
				}
     
    }else{
      $emailError = '<strong style="color: red;">Invalid Email..!</strong>';
      
    }

  }else{
    $emailError = '<strong style="color: red;">Input Email Address..!</strong>';
    
} 


   

                    // user Role Validation 
             
                     
                        $role = $_POST['role'];
                  
                    //  Password vaidation 
		
		if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {
			if (strlen($_POST['password']) >= 6) {
				if ($_POST['password'] == ($_POST['c_password'])) {
					$password = md5($_POST['password']);
					
				}else {
                    $confirmpassError = '<strong style="color: red;">Your Password Are Not Same..!</strong>'; 
				}
			}else {
                $passError = '<strong style="color: red;">Your Password Should Be 6                 Characters Or Longer Then..!</strong>';  
			}
		}else {
			$passError = '<strong style="color: red;">Please Create Your Password..!</               strong>';     
		}


        if (isset($username) && isset($role) && isset($password) && isset($email) ) {

           $username = mysqli_real_escape_string($db->link, $username);
           $email = mysqli_real_escape_string($db->link, $email);
           $role =     mysqli_real_escape_string($db->link, $role);
           $password =  mysqli_real_escape_string($db->link, $password);

             // insert data into database 
             $query = "INSERT INTO tbl_users(username, email, password, role) VALUES ('$username', '$email','$password','$role')";
             $insert = $db->insert($query);
             if ($insert == true) {
              // $subsuccess =  '<strong style="color: green;"> User Added Successfully..!</strong>';

              $subsuccess = '<strong style="green: red;">User Added Success..!</strong>';
                 
             }else {
                 $subsuccess = '<strong style="color: red;">User Added Failed..!</strong>';
             }
            
        }
                       

                   
         }
            ?>

        
                <!-- =-=-=-=-=-=-=-=MainSection=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-md-offset-2">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">

                                <?php if (isset($subsuccess)) {
                               echo $subsuccess;
                            }?>
                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4> Add User New</h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="all-user.php" class="btn btn-primary">All User</a>

                                        </div>
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST">
                              
        <div class="form-group">
        <label for="brand_name" class="col-sm-3 control-label">Username</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="username" value="" placeholder="User name"  data-validation="required">

     <?php if (isset($usernameError)) {
                               echo $usernameError;
                            }?>
                                    
       </div>                                                    
       </div>
       
       <!-- Email  -->

     <div class="form-group">
        <label for="brand_name" class="col-sm-3 control-label">Email</label>
     <div class="col-sm-9">
     <input type="email" class="form-control" name="email" value="" placeholder="Email"  data-validation="required">
     <?php if (isset($emailError)) {
                   echo $emailError;
                  }?>
                                                      
       </div>    
                                                       
       </div>
      

        <!--  password -->

     <div class="form-group">
        <label for="user_role" class="col-sm-3 control-label">User Role</label>
     <div class="col-sm-9">
     <select name="role" id="user_role" class="form-control"  data-validation="required" >
       <option >Select Option</option>
       <option value="0">Admin</option>
       <option value="1">Editor</option>
       <option value="2">Author</option>
     </select>
                                                      
       </div>                                                    
       </div>

  
      

       <!--  password -->

     <div class="form-group">
        <label for="brand_name" class="col-sm-3 control-label">New Password</label>
     <div class="col-sm-9">
     <input type="password" class="form-control" name="password" value="" placeholder="New Password"  data-validation="required">
     <?php if (isset($passError)) {
               echo $passError;
                            }?>
                                                
       </div>                                                    
       </div>

      

        <!--  Confirm password -->

     <div class="form-group">
        <label for="brand_name" class="col-sm-3 control-label">Confirm Password</label>
     <div class="col-sm-9">
     <input type="password" class="form-control" name="c_password" value="" placeholder="Confirm Password"  data-validation="required">
     <?php if (isset($confirmpassError)) {
                               echo $confirmpassError;
             }?>                                   
       </div>                                                    
       </div>
       
       


      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
           
      <input type="submit" name="submit" class="btn btn-primary" value="Add User">
                              
    
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