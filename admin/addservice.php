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

                            <li><i class="" aria-hidden="true"></i><a href="about.php">About Me</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="education.php">Education</a></li>

                        </ul>
                    </div>
                </div>
     <?php 
      // title 
           if (isset($_POST['submit'])) {

       if (isset($_POST['title']) && !empty($_POST['title'])) {
                              
                $title = $_POST['title'];
                               
           }else {
                 $titleError = '<strong style="color: red;">Please Input  Title..!</strong>';
                    }

                     // name 
     

            if (isset($_POST['descp']) && !empty($_POST['descp'])) {
                                   
                     $descp = $_POST['descp'];
               
     
                           
                             
                }else {
                      $subtitleError = '<strong style="color: red;">Please Input Your Sub Title ..!</strong>';
                         }

             // name 
         

            
                  
            if (isset($_POST['icon']) && !empty($_POST['icon'])) {
                                   
              $icon = $_POST['icon'];                            
         }else {
               $skilError = '<strong style="color: red;"> Input Icon text!</strong>';
           }





        if (isset($title) && isset($descp) && isset($icon) ) {

           $title = mysqli_real_escape_string($db->link, $title);
           $descp = mysqli_real_escape_string($db->link, $descp);
           $icon =     mysqli_real_escape_string($db->link, $icon);
            
           $query = "INSERT INTO services(icon,title,descp) VALUES ('$icon', '$title','$descp')";
             $insert = $db->insert($query);
            
             if ($insert == true) {
              // $subsuccess =  '<strong style="color: green;"> User Added Successfully..!</strong>';

              $subsuccess = '<h4 class="text-center" style="color: green;">Information Successfully Inserted..!</h4>';
                 
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
                                        <div class="col-xs-6">
                                            <h4>Add Service</h4>
                                           
                                        </div>

                                        <div class="col-xs-6 text-right">
                                           <a href="alleducation.php" class="btn btn-primary">All Service</a>
                                        </div>
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST" >

    
     <div class="form-group">
        <label for="skill" class="col-sm-3 control-label">Icon</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="skill" name="icon" value="" placeholder="fa fa-user"  data-validation="required">

     <?php if (isset($skilError)) {
                               echo $skilError;
                            }?>
                                    
       </div>                                                    
       </div>
       
       
        <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Service Name</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="title" value="" placeholder="Service Name"  data-validation="required">

     <?php if (isset($titleError)) {
                               echo $titleError;
                            }?>
                                    
       </div>                                                    
       </div>
                            


     <div class="form-group">
        <label for="subtitle" class="col-sm-3 control-label">Description</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="descp" value="" placeholder=" Some details"  data-validation="required">

     <?php if (isset($subtitleError)) {
                               echo $subtitleError;
                            }?>
                                    
       </div>                                                    
       </div>

      

      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
           
      <input type="submit" name="submit" class="btn btn-primary" value="Add">
                              
    
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