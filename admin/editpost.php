<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
                if (isset($_GET['id'])) {
                    $getId = $_GET['id'];

                }else {
                    header("location: allwork.php");
                }
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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>

                            <li><i class="" aria-hidden="true"></i><a href="social.php">My Work</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="social.php">Update Post</a></li>

                        </ul>
                    </div>
                </div>
  
                <!-- validation  -->
                <?php 
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Validation 
                    // title 
                    if (isset($_POST['title']) && !empty($_POST['title'])) {
                              
                      $title = $_POST['title'];
                                     
                 }else {
                       $titleError = '<strong style="color: red;">Please Input Your Title..!</strong>';
                          }
      
            // category 
            if (isset($_POST['cat']) && !empty($_POST['cat'])) {

            
                $cat = $_POST['cat'];
                                                                             
            }else {
                $catError = '<strong style="color: red;">Please select Your Category..!</strong>';      
               
                
            }

             // description 
             if (isset($_POST['descp']) && !empty($_POST['descp'])) {

                $descp = $_POST['descp'];
                                                                             
            }else {
                $descpError = '<strong style="color: red;">Please write Your post Description..!</strong>';      
               
                
            }

             

            // image validation 

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/post/".$unique_image;

                if (!empty($file_name)) {
                           
                  if ($file_size > 1048567) {
      
                      $imgeError = "<span class='error'>Image Size should be less then 1MB!
                      </span>";
                  
                     } elseif (in_array($file_ext, $permited) === false) {
                      $imgeError = "<span class='error'>You can upload only:-"
                      .implode(', ', $permited)."</span>";
      
}else {
                    //    insert data 

            if (isset($title) && isset($cat) && isset($descp) ) {
                $title  =  mysqli_real_escape_string($db->link, $_POST['title']);
                $cat    =  mysqli_real_escape_string($db->link, $_POST['cat']);
                $descp   =  mysqli_real_escape_string($db->link, $_POST['descp']);
               
                            
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE works
                         SET 
                         cat_name = '$cat',
                         title  = '$title',
                         descp   = '$descp',
                         image  = '$uploaded_image'                      
                         WHERE id = '$getId'";
                    $updated_rows = $db->update($query);
                   if ($updated_rows) {
                    $imgeSucc = "<span class='success'>Your Post Uploaded Successfully.
                    </span>";
                   
                 }else {
                  $imgeSucc =  "<span class='error'>Post Not Inserted !</span>";
                  }
                   
               }
               
              
          }



        }else {
          $sql = "UPDATE works
          SET 
          cat_name = '$cat',
          title  = '$title',
          descp   = '$descp'        
          WHERE id = '$getId'";

    
      $update_rows = $db->update($sql);
      if ($update_rows) {
       echo "<span class='success'>Your Post Updated Successfully.
          </span>";
      
      }else {
       echo "<span class='error'>Post Not Update.. !</span>";
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

                                <?php if (isset($imgeSucc)) {
                               echo $imgeSucc;
                            }?>
                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h3 class="text-primary">Edit Post</h3>
                                            <hr>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                       

                                        </div>
                                       
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

         <?php 
         
         $queryy = "SELECT * FROM works where id = '$getId'";
                                    
         $result = $db->select($queryy);
         if ($result) {
         while ($row = mysqli_fetch_assoc($result)) {
                                                          
        ?>
         
                       
     <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Title</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" data-validation="required">

     <?php if (isset($titleError)) {
                               echo $titleError;
                            }?>
                                    
       </div>                                                    
       </div>

       <!-- Category select  -->

       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Category</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="cat" value="<?php echo $row['cat_name']; ?>"  data-validation="required">
                                    
     <?php if (isset($catError)) {
                               echo $catError;
                            }?>              
       </div>                                                    
       </div>
     
      
        <!-- Descricription  -->
        <div class="form-group">
        <label for="descp" class="col-sm-3 control-label">Description</label>
     <div class="col-sm-9">
    <textarea name="descp" id="descp" cols="60"  data-validation="required" placeholder="Description" rows="6"><?php echo $row['descp']; ?></textarea>

     <?php if (isset($descpError)) {
                               echo $descpError;
                            }?>
                                    
       </div>                                                    
       </div>
                                    
        <div class="row"> 
        <div class="col-xs-6">
      
        </div>                           
     <div class="col-xs-6 text-right">
     <img src="<?php echo $row ['image']; ?>" style="border-radius: 20%;" height="100px;" width="100px;"  alt="banner"/>                             

        </div>
        </div>

        <div class="form-group">
        <label for="banner" class="col-sm-3 control-label">Upload Image</label>
     <div class="col-sm-6">
       
     <input type="file"  id="banner" name="image">
     <?php if (isset($imgeError)) {
                               echo $imgeError;
                            }?>    
                                    
       </div>                                                    
       </div>
 
    <?php }} ?>

      <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
           
      <input type="submit" name="submit" class="btn btn-primary" value="Upload">
                              
    
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