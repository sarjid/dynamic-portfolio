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

                            <li><i class="" aria-hidden="true"></i><a href="social.php">Portfolio</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="social.php">Post Work</a></li>

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
                       $titleError = '<strong style="color: red;">Please Input Client title..!</strong>';
                          }
      
            // category 
            if (isset($_POST['name']) && !empty($_POST['name'])) {

            
                $name = $_POST['name'];
                                                                             
            }else {
                $catError = '<strong style="color: red;">Please Input Client Name..!</strong>';      
               
                
            }

             // description 
             if (isset($_POST['comment']) && !empty($_POST['comment'])) {

                $comment = $_POST['comment'];
                                                                             
            }else {
                $descpError = '<strong style="color: red;">Please write Your CLient reviews..!</strong>';      
               
                
            }

             

            // image validation 

            $permited  = array('png');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/client/".$unique_image;

         if (empty($file_name)) {
                $imgeError = "<span class='error'>Please Select any Image !</span>";
               }elseif ($file_size >1048567) {
                $imgeError = "<strong style='color:red;'>Image Size should be less then 1MB!
                </strong>";
               } elseif (in_array($file_ext, $permited) === false) {
                $imgeError = "<span style='color:red;'>You can upload only:-"
                .implode(', ', $permited)."</span>";

        }else {
                    //    insert data 

            if (isset($title) && isset($name) && isset($comment) ) {
                $title  =  mysqli_real_escape_string($db->link, $_POST['title']);
                $name    =  mysqli_real_escape_string($db->link, $_POST['name']);
                $comment   =  mysqli_real_escape_string($db->link, $_POST['comment']);
               
            
                move_uploaded_file($file_temp, $uploaded_image);
    
                   $query = "INSERT INTO testimonial (name, title, comment, image) VALUES('$name', '$title','$comment','$uploaded_image')";
                   $inserted_rows = $db->insert($query);
                   if ($inserted_rows) {
                    $imgeSucc = "<h3 style='color:green;'>Your Post Uploaded Successfully.
                    </h3>";
                   
                 }else {
                  $imgeSucc =  "<span class='error'>Post Not Inserted !</span>";
                }
                   
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
                                            <h3 class="">Add Client Reviews</h3>
                                            <hr>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                       
                                        <a class="btn btn-primary" href="alltestimonial.php">All Clients</a>
                                        </div>
                                       
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

      <!-- Category select  -->

      <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Name</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="name" value="" placeholder="Client Name"  data-validation="required">
                                    
     <?php if (isset($catError)) {
                               echo $catError;
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
        <label for="descp" class="col-sm-3 control-label">Comment</label>
     <div class="col-sm-9">
    <textarea name="comment" id="descp" cols="50"  data-validation="required" placeholder="Clients Comment" rows="5"></textarea>

     <?php if (isset($descpError)) {
                               echo $descpError;
                            }?>
                                    
       </div>                                                    
       </div>
                              
        <div class="form-group">
        <label for="banner" class="col-sm-3 control-label">Upload Image</label>
     <div class="col-sm-9">
     <input type="file"  id="banner"  name="image">
     <small class="text-danger">Picture size 86*86px Required</small>
     <?php if (isset($imgeError)) {
                               echo $imgeError;
                            }?>    
                                    
       </div>                                                    
       </div>
 


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