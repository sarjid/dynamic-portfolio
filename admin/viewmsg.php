<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
                if (isset($_GET['id'])) {
                    $getId = $_GET['id'];

                }else {
                    header("location: inbox.php");
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

                            <li><i class="" aria-hidden="true"></i><a href="social.php">Message</a></li>
                            <li><i class="" aria-hidden="true"></i><a href="social.php">View Message</a></li>

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
                                            <h3 class="text-primary">View Message</h3>
                                            <hr>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                       <a href="allmsg.php" class="btn btn-primary">All Message</a>

                                        </div>
                                       
                                       
                                    </div>
                  <div class="row">
                   <div class="col-md-12">
 
     <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

     <?php
                    $queryy = "SELECT * FROM messages where id = '$getId'";
                                    
                     $result = $db->select($queryy);
                     if ($result) {
                     while ($row = mysqli_fetch_assoc($result)) {
                                                                      
                    ?>                      
     <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Name</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['name']; ?>" readonly ">

     
                                    
       </div>                                                    
       </div>

       <!-- Category select  -->
       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Email</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="cat" value="<?php echo $row['email']; ?>" readonly   data-validation="required">
             
       </div>                                                    
       </div>

       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Date</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="cat" value="<?php echo $frmt->formatDate($row['time']); ?>" readonly   data-validation="required">
             
       </div>                                                    
       </div>
     
      
        <!-- Descricription  -->
        <div class="form-group">
        <label for="descp" class="col-sm-3 control-label">Message</label>
     <div class="col-sm-9">
    <textarea name="descp" id="descp" cols="60"  data-validation="required" readonly placeholder="Description" rows="7"><?php echo $row['message']; ?></textarea>

   
                                    
       </div>                                                    
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