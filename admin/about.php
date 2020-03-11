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

                            <li><i class="" aria-hidden="true"></i><a href="addname.php">Set Name</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="addname.php">Add Name</a></li>

                        </ul>
                    </div>
                </div>
     <?php 
      // title 
           if (isset($_POST['submit'])) {

       if (isset($_POST['title']) && !empty($_POST['title'])) {
                              
                $title = $_POST['title'];
                               
           }else {
                 $titleError = '<strong style="color: red;">Please Input Your Title..!</strong>';
                    }

                     // name 
     

            if (isset($_POST['subtitle']) && !empty($_POST['subtitle'])) {
                                   
                     $subtitle = $_POST['subtitle'];
               
     
                           
                             
                }else {
                      $subtitleError = '<strong style="color: red;">Please Input Your Sub Title ..!</strong>';
                         }

             // Description 
         

            if (isset($_POST['descp']) && !empty($_POST['descp'])) {
                                   
                     $descp = $_POST['descp'];
               
     
                           
                             
                }else {
                      $descpError = '<strong style="color: red;">Please Input About Your Description..!</strong>';
                         }


                      $education = $_POST['education'];


        if (isset($title) && isset($subtitle) && isset($descp) && isset($education) ) {

           $title = mysqli_real_escape_string($db->link, $title);
           $subtitle = mysqli_real_escape_string($db->link, $subtitle);
           $descp =     mysqli_real_escape_string($db->link, $descp);
           $education =     mysqli_real_escape_string($db->link, $education);
            
             $query = "UPDATE about_me SET 
                        sub_title  = '$subtitle',
                        title  = '$title',
                        descp  = '$descp',
                        education  = '$education'
                         WHERE id = '1' ";      
       $updated_rows = $db->update($query);
            
             if ($updated_rows == true) {
              // $subsuccess =  '<strong style="color: green;"> User Added Successfully..!</strong>';

              $subsuccess = '<h4 class="text-center" style="color: green;">Information Successfully Updated..!</h4>';
                 
             }else {
                 $subsuccess = '<strong style="color: red;">Info Added Failed..!</strong>';
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
                                         
                                            <h3>About Your Self</h3>
                                            <hr>
                                        </div>
                                      
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST" >

     <!-- name  -->

     <div class="form-group">
        <label for="subtitle" class="col-sm-3 control-label">Sub Title</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="subtitle" value="" placeholder="Sub Title"  data-validation="required">

     <?php if (isset($subtitleError)) {
                               echo $subtitleError;
                            }?>
                                    
       </div>                                                    
       </div>

                              
        <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Title</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="title" value="" placeholder="Title"  data-validation="required">

     <?php if (isset($titleError)) {
                               echo $titleError;
                            }?>
                                    
       </div>                                                    
       </div>
 


       
             
        <!-- Descricription  -->
        <div class="form-group">
        <label for="descp" class="col-sm-3 control-label">Description</label>
     <div class="col-sm-9">
    <textarea name="descp" id="descp" cols="50"  data-validation="required" placeholder="Description" rows="5"></textarea>

     <?php if (isset($descpError)) {
                               echo $descpError;
                            }?>
                                    
       </div>                                                    
       </div>

       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Education</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="education" value="" placeholder="Education Name"  data-validation="required">

    
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