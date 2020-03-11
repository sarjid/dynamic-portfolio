<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php
                if (isset($_GET['id'])) {
                    $getId = $_GET['id'];

                }else {
                    header("location: allmsg.php");
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
                            <li><i class="" aria-hidden="true"></i><a href="social.php">Reply Message</a></li>

                        </ul>
                    </div>
                </div>
  
               
                <!-- =-=-=-=-=-=-=-=MainSection=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">
                                <?php
                    
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                          //   validation 
  
                    
                    $toemail = $_POST['toemail'];
                                                                 
                    
  
                  // from Email 
            if (isset($_POST['fromemail']) && !empty($_POST['fromemail'])) {
                    $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                    if (preg_match($pattern, $_POST['fromemail'])) {
                      $fromemail = $_POST['fromemail'];

                    }else{
                      $fromemailError = '<strong style="color: red;">Inavlid Email.!</strong>';
                      
                    }
                                                         
              }else {
              $fromemailError = '<strong style="color: red;">Please Input Your Email Name..!</strong>';
          }
  
                  // subject 
  
                    // from Email 
               if (isset($_POST['subject']) && !empty($_POST['subject'])) {
                      $subject = $_POST['subject'];
                                                         
              }else {
              $subjectError = '<strong style="color: red;">Please Input Your Email Subject..!</strong>';
          }
  
  
          // message 
               if (isset($_POST['message']) && !empty($_POST['message'])) {
                    $message = $_POST['message'];
                                                          
                  }else {
                  $messageError = '<strong style="color: red;">Please Input Your Messeage..!</strong>';
              }
  
              // send message 
  
              if (isset($toemail) && isset($fromemail) && isset($subject) && isset($message)) {
                  $headers = 'From:'.$fromemail. "\r\n" .
                              'Reply-To:'.$fromemail. "\r\n" .
                                  'X-Mailer: PHP/' . phpversion();
  
                  $sendmessage = mail($toemail, $subject, $message, $headers);
                  if ($sendmessage !== false) {
                    $subsuccess = '<h3 style="color:green;"> Message Send Successfully..!</h3>';
                     
                  }else {
                    $subsuccess = '<h3 style="color:red;">Message Not Send..!</h3>';
                      
                  }
                  
              }                         
              
      }
   ?>         <?php if (isset($subsuccess)) {
                        echo $subsuccess;
                     }?>
                           

                                    
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h3 class="text-primary">Reply Message</h3>
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
        <label for="title" class="col-sm-3 control-label">To </label>
     <div class="col-sm-9">
     <input type="text" name="toemail" class="form-control" readonly id="title" name="=email" value="<?php echo $row['email']; ?>" readonly ">
     <?php }} ?>                                
       </div>                                                    
       </div>

       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">From</label>
     <div class="col-sm-9">
     <input type="Email" class="form-control" id="title" name="fromemail" placeholder="Your Email" data-validation="required">
     <?php if (isset($fromemailError)) {
            echo $fromemailError; }?>
      
             
       </div>                                                    
       </div>

       <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Subject</label>
     <div class="col-sm-9">
     <input type="text" class="form-control" id="title" name="subject" placeholder="Subject Name" data-validation="required">
     <?php if (isset($subjectError)) {
               echo $subjectError;
                            }?>
             
       </div>                                                    
       </div>
     
      
        <!-- Descricription  -->
        <div class="form-group">
        <label for="descp" class="col-sm-3 control-label">Message</label>
     <div class="col-sm-9">
    <textarea name="message" id="descp" cols="60"  data-validation="required"  placeholder="Message" rows="7"></textarea>

    <?php if (isset($messageError)) {
               echo $messageError;
                            }?>
                                    
       </div>                                                    
       </div>

        <!-- button  -->
        <div class="form-group">
        <label for="descp" class="col-sm-3 control-label"></label>
     <div class="col-sm-9">
      <button class="btn btn-primary">Send Reply</button>
   
                                    
       </div>                                                    
       </div>
                              
                                                      
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