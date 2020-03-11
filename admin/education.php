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
     

            if (isset($_POST['subtitle']) && !empty($_POST['subtitle'])) {
                                   
                     $subtitle = $_POST['subtitle'];
               
     
                           
                             
                }else {
                      $subtitleError = '<strong style="color: red;">Please Input Your Sub Title ..!</strong>';
                         }

             // name 
         

            
                  
            if (isset($_POST['skill']) && !empty($_POST['skill'])) {
                                   
              $skill = $_POST['skill'];                            
         }else {
               $skilError = '<strong style="color: red;"> Input Skill Percent %..!</strong>';
           }





        if (isset($title) && isset($subtitle) && isset($skill) ) {

           $title = mysqli_real_escape_string($db->link, $title);
           $subtitle = mysqli_real_escape_string($db->link, $subtitle);
           $skill =     mysqli_real_escape_string($db->link, $skill);
            
           $query = "INSERT INTO education(title,sub_title,skill) VALUES ('$title', '$subtitle','$skill')";
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
                        <div class="col-sm-12 col-md-8 col-md-offset-2">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">

                                <?php if (isset($subsuccess)) {
                               echo $subsuccess;
                            }?>
                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4>Your Educational Info</h4>
                                           
                                        </div>

                                        <div class="col-xs-6 text-right">
                                           <a href="alleducation.php" class="btn btn-primary">All Skill</a>
                                        </div>
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST" >

    
                                                   
        <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Title</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="title" value="" placeholder="Skill Name Or Year"  data-validation="required">

     <?php if (isset($titleError)) {
                               echo $titleError;
                            }?>
                                    
       </div>                                                    
       </div>
                            


     <div class="form-group">
        <label for="subtitle" class="col-sm-3 control-label">Sub Title</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" name="subtitle" value="" placeholder="Skill name Some details"  data-validation="required">

     <?php if (isset($subtitleError)) {
                               echo $subtitleError;
                            }?>
                                    
       </div>                                                    
       </div>

       
       <div class="form-group">
        <label for="skill" class="col-sm-3 control-label">Skill </label>
     <div class="col-sm-9">
     <input type="number" class="form-control" id="skill" name="skill" value="" placeholder="skill out of 100%"  data-validation="required">

     <?php if (isset($skilError)) {
                               echo $skilError;
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