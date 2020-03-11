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

                            <li><i class="" aria-hidden="true"></i><a href="social.php">Logo & Banner</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="social.php">Banner</a></li>

                        </ul>
                    </div>
                </div>
  
               
                <!-- =-=-=-=-=-=-=-=MainSection=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">

                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h3 class="text-primary">View Post</h3>
                                            <hr>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                       <a href="allwork.php" class="btn btn-primary">All Post</a>

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
     <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" readonly ">

     
                                    
       </div>                                                    
       </div>

       <!-- Category select  -->

       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Category</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="cat" value="<?php echo $row['cat_name']; ?>" readonly   data-validation="required">
             
       </div>                                                    
       </div>
     
      
        <!-- Descricription  -->
        <div class="form-group">
        <label for="descp" class="col-sm-3 control-label">Description</label>
     <div class="col-sm-9">
    <textarea name="descp" id="descp" cols="60"  data-validation="required" readonly placeholder="Description" rows="7"><?php echo $row['descp']; ?></textarea>

   
                                    
       </div>                                                    
       </div>
                              
        <div class="form-group">
        <label for="banner" class="col-sm-3 control-label">Image</label>
        <img src="<?php echo $row ['image']; ?>" height="200px;" width="200px;"  alt="banner"/>
                                    
       </div>                                                    
       </div>
 


           
          <?php }       
               }else {
                   echo "Category Not Found";
                         }
                ?>
                              
    
 
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