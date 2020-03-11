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

                            <li><i class="" aria-hidden="true"></i><a href="addbrand.php">Brand</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="allbrand.php">All brand</a></li>

                        </ul>
                    </div>
                </div>
  
                <!-- validation  -->
                <?php 
             if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          
            // image validation 

            $permited  = array('png');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];
            
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/brand/".$unique_image;

         if (empty($file_name)) {
                $imgeError = "<span style='color:red;'>Please Select an Image !</span>";
               }elseif ($file_size >1048567) {
                $imgeError = "<strong style='color:red;'>Image Size should be less then 1MB!
                </strong>";
               } elseif (in_array($file_ext, $permited) === false) {
                $imgeError = "<span style='color:red;'>You can upload only:-"
                .implode(', ', $permited)."</span>";

        }else {
                    //    insert data 

            
                move_uploaded_file($file_temp, $uploaded_image);
    
                   $query = "INSERT INTO brand (image) VALUES('$uploaded_image')";
                   $inserted_rows = $db->insert($query);
                   if ($inserted_rows) {
                    $imgeSucc = "<h3 style='color:green;'>Your Image Uploaded Successfully.
                    </h3>";
                   
                 }else {
                  $imgeSucc =  "<span class='error'>Post Not Inserted !</span>";
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
                                            <h3 class="">Upload Brand Image</h3>
                                            <hr>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                       
                                        <a class="btn btn-primary" href="allbrand.php">All Brand</a>
                                        </div>
                                       
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

      
                              
        <div class="form-group">
        <label for="banner" class="col-sm-3 control-label">Upload Image</label>
     <div class="col-sm-9">
     <input type="file"  id="banner"  name="image">
     <small class="text-danger">Picture size widht-150 * Height-69px Required</small> <br>
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