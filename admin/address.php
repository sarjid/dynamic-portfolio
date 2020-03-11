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

                            <li><i class="" aria-hidden="true"></i><a href="addname.php">Address</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="addname.php">Add Address</a></li>

                        </ul>
                    </div>
                </div>
     <?php 
      // title 
           if (isset($_POST['submit'])) {

       if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                              
                $phone = $_POST['phone'];
                               
           }else {
                 $titleError = '<strong style="color: red;">Please Input Your Phone..!</strong>';
                    }

                     // name 
     

            if (isset($_POST['lives_in']) && !empty($_POST['lives_in'])) {
                                   
                     $lives_in = $_POST['lives_in'];
               
     
                           
                             
                }else {
                      $subtitleError = '<strong style="color: red;">Please Input Your living Address ..!</strong>';
                         }

             // Description 
         

            if (isset($_POST['address']) && !empty($_POST['address'])) {
                                   
                     $address = $_POST['address'];                         
                             
                }else {
                      $descpError = '<strong style="color: red;">Please Input About Your Full Address.!</strong>';
                         }
                          // email 
               if (isset($_POST['email']) && !empty($_POST['email'])) {
   
              $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
              if (preg_match($pattern, $_POST['email'])) {
                    $email = $_POST['email'];
                  }else{
                    $emailError = '<strong style="color: red;">Please inter valid Email.!</strong>';
                            
                   }
                          
                         
                 }else{
                    $emailError = '<strong style="color: red;">Please Input Your Email Address ..!</strong>';
                     
                      } //===Email ENd=======


                 


        if (isset($lives_in) && isset($address) && isset($phone) && isset($email) ) {

           $lives_in = mysqli_real_escape_string($db->link, $lives_in);
           $address = mysqli_real_escape_string($db->link, $address);
           $phone =     mysqli_real_escape_string($db->link, $phone);
           $email =     mysqli_real_escape_string($db->link, $email);
            
             $query = "UPDATE contact SET 
                        lives_in  = '$lives_in',
                        address  = '$address',
                        phone  = '$phone',
                        email  = '$email'
                         WHERE id = '1' ";      
       $updated_rows = $db->update($query);
            
             if ($updated_rows == true) {
              // $subsuccess =  '<strong style="color: green;"> User Added Successfully..!</strong>';

              $subsuccess = '<h4 class="text-center" style="color: green;">Info Successfully Updated..!</h4>';
                 
             }else {
                 $subsuccess = '<strong style="color: red;">Info Added Failed..!</strong>';
             }
            
        }
                       

                   
         }
            ?>

        
                <!-- =-=-=-=-=-=-=-=MainSection=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">

                                <?php if (isset($subsuccess)) {
                               echo $subsuccess;
                            }?>
                                    
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                         
                                            <h3>Your Address</h3>
                                            <hr>
                                        </div>
                                      
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST" >

     <!-- name  -->

     <div class="form-group">
        <label for="subtitle" class="col-sm-3 control-label">Live in</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="lives_in" value="" placeholder="where are you Live.?"  data-validation="required">

     <?php if (isset($subtitleError)) {
                               echo $subtitleError;
                            }?>
                                    
       </div>                                                    
       </div>

            <!-- Descricription  -->
            <div class="form-group">
        <label for="descp" class="col-sm-3 control-label">Addres</label>
     <div class="col-sm-9">
    <textarea name="address" id="descp" cols="50"  data-validation="required" placeholder="Your Address" rows="5"></textarea>

     <?php if (isset($descpError)) {
                               echo $descpError;
                            }?>
                                    
       </div>                                                    
       </div>

                              
        <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Phone</label>
     <div class="col-sm-9">
     <input type="number" class="form-control" id="title" name="phone" value="" placeholder="Phone Number"  data-validation="required">

     <?php if (isset($titleError)) {
                               echo $titleError;
                            }?>
                                    
       </div>                                                    
       </div>
 


       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Email</label>
     <div class="col-sm-9">
     <input type="email"  class="form-control" id="title" name="email" value="" placeholder="Email"  data-validation="required">

    
     <?php if (isset($emailError)) {
                               echo $emailError;
                            }?>
                                    
       </div>   
       </div>                                                    
       </div>
 
       


      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
           
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                              
    
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