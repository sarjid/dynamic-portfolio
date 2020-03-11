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

                            <li><i class="" aria-hidden="true"></i><a href="social.php">Social</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="social.php">Add Social Link</a></li>

                        </ul>
                    </div>
                </div>
     <?php 
      // title 
           if (isset($_POST['submit'])) {

       if (isset($_POST['facebook']) && !empty($_POST['facebook'])) {
                              
                $facebook = $_POST['facebook'];
                               
           }else {
                 $facebookError = '<strong style="color: red;">Please Input Your Facebook Link..!</strong>';
                    }

                     // name 
     

            if (isset($_POST['twitter']) && !empty($_POST['twitter'])) {
                                   
                     $twitter = $_POST['twitter'];
               
     
                           
                             
                }else {
                      $twitterError = '<strong style="color: red;">Please Input Your Name..!</strong>';
                         }

             // instagram 
         

            if (isset($_POST['instagram']) && !empty($_POST['instagram'])) {
                                   
                     $instagram = $_POST['instagram'];
              
     
                           
                             
                }else {
                      $instagramError = '<strong style="color: red;">Please Input Your Instagram Link..!</strong>';
                         }
              
            // pinterest 
         

            if (isset($_POST['pinterest']) && !empty($_POST['pinterest'])) {
                                   
              $pinterest = $_POST['pinterest'];
        

                    
                      
         }else {
               $pinterestError = '<strong style="color: red;">Please Input Your pinterest Link..!</strong>';
                  }





        if (isset($facebook) && isset($twitter) && isset($instagram) && isset($pinterest) ) {

           $facebook = mysqli_real_escape_string($db->link, $facebook);
           $twitter = mysqli_real_escape_string($db->link, $twitter);
           $instagram = mysqli_real_escape_string($db->link, $instagram);
           $pinterest = mysqli_real_escape_string($db->link, $pinterest);
            
             $query = "UPDATE tbl_socials SET 
                        facebook  = '$facebook',
                        twitter  = '$twitter',
                        instagram  = '$instagram',
                        pinterest  = '$pinterest'
                         WHERE id = '1' ";      
       $updated_rows = $db->update($query);
            
             if ($updated_rows == true) {
              // $subsuccess =  '<strong style="color: green;"> User Added Successfully..!</strong>';

              $subsuccess = '<h4 class="text-center" style="color: green;">Successfully Link  Updated..!</h4>';
                 
             }else {
                 $subsuccess = '<strong style="color: red;">Info Added Failed..!</strong>';
             }
            
        }
                       

                   
         }
            ?>

        
                <!-- =-=-=-=-=-=-=-=MainSection=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">

                                <?php if (isset($subsuccess)) {
                               echo $subsuccess;
                            }?>
                                    
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h3 class="text-primary text-center">Social Links</h3>
                                            <hr>
                                        </div>
                                       
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST">
                              
        <div class="form-group">
        <label for="facebook" class="col-sm-3 control-label">Facebook</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="facebook" name="facebook" value="" placeholder="Facbook Link"  data-validation="required">

     <?php if (isset($facebookError)) {
                               echo $facebookError;
                            }?>
                                    
       </div>                                                    
       </div>
 


       <!-- twitter  -->

       <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Twitter</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="twitter" value="" placeholder="Twitter Link"  data-validation="required">

     <?php if (isset($twitterError)) {
                               echo $twitterError;
                            }?>
                                    
       </div>                                                    
       </div>

       <!-- Instagram  -->
       <div class="form-group">
        <label for="instagram" class="col-sm-3 control-label">Instagram</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="instagram" value="" placeholder="instagram Link"  data-validation="required">

     <?php if (isset($instagramError)) {
                               echo $instagramError;
                            }?>
                                    
       </div>                                                    
       </div>

             
        <!-- pinterest  -->
        <div class="form-group">
        <label for="pinterest" class="col-sm-3 control-label">Pinterest</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="pinterest" value="" placeholder="Pinterest Link"  data-validation="required">

     <?php if (isset($pinterestError)) {
                               echo $pinterestError;
                            }?>
                                    
       </div>                                                    
       </div>
       


      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
           
      <input type="submit" name="submit" class="btn btn-primary" value="Add Link">
                              
    
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