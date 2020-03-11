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

                            <li><i class="" aria-hidden="true"></i><a href="about.php">Fact</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="education.php">Add Fact</a></li>

                        </ul>
                    </div>
                </div>
     <?php 
      // title 
           if (isset($_POST['submit'])) {

       if (isset($_POST['name']) && !empty($_POST['name'])) {
                              
                $name = $_POST['name'];
                               
           }else {
                 $titleError = '<strong style="color: red;">Please Input Fact Name..!</strong>';
                    }

                     // name 
     

            if (isset($_POST['count']) && !empty($_POST['count'])) {
                                   
                     $count = $_POST['count'];
               
     
                           
                             
                }else {
                      $subtitleError = '<strong style="color: red;">Please Input Your Count Number ..!</strong>';
                         }

             // name 
         

            
                  
            if (isset($_POST['icon']) && !empty($_POST['icon'])) {
                                   
              $icon = $_POST['icon'];                            
         }else {
               $skilError = '<strong style="color: red;"> Input  Icon text!</strong>';
           }





        if (isset($name) && isset($count) && isset($icon) ) {

           $name = mysqli_real_escape_string($db->link, $name);
           $count = mysqli_real_escape_string($db->link, $count);
           $icon =     mysqli_real_escape_string($db->link, $icon);
            
           $query = "INSERT INTO facts(icon,count,fact_name) VALUES ('$icon', '$count','$name')";
             $insert = $db->insert($query);
            
             if ($insert == true) {
              // $subsuccess =  '<strong style="color: green;"> User Added Successfully..!</strong>';

              $subsuccess = '<h4 class="text-center" style="color: green;">Facts Successfully Inserted..!</h4>';
                 
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
                                            <h4>Add Fact</h4>
                                           
                                        </div>

                                        <div class="col-xs-6 text-right">
                                           <a href="allfact.php" class="btn btn-primary"> Facts list</a>
                                        </div>
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action=" " method="POST" >

    
     <div class="form-group">
        <label for="skill" class="col-sm-3 control-label">Icon</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="skill" name="icon" value="" placeholder="fa fa-icon"  data-validation="required">

     <?php if (isset($skilError)) {
                               echo $skilError;
                            }?>
                                    
       </div>                                                    
       </div>
      
                          
     <div class="form-group">
        <label for="subtitle" class="col-sm-3 control-label">Count</label>
     <div class="col-sm-9">
     <input type="number" class="form-control" name="count" value="" placeholder="Maximum Count Number"  data-validation="required">

     <?php if (isset($subtitleError)) {
                               echo $subtitleError;
                            }?>
                                    
       </div>                                                    
       </div>

         
       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Fact Name</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="name" name="name" value="" placeholder="Service Name"  data-validation="required">

     <?php if (isset($titleError)) {
                               echo $titleError;
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