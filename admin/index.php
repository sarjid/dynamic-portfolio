<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


     <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-0">
                            <div class="  ">
                                <div class="panel-content">

                                      <!--WIDGETBOX-->
               <div class="col-sm-12 col-md-6 col-md-offset-0 text-center">
                                <div class="panel widgetbox wbox-2 bg-scale-0">
                                    <a href="allwork.php">
                                        <div class="panel-content">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-globe color-darker-1"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-darker-1">All Posts</h4>
                                                    <h1 class="title color-primary"><?php 
						$sqll = "SELECT * FROM works ORDER BY id DESC";
						$msg = $db->select($sqll);
						if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo $count;
                        }else{
                            echo "";
                        }					
						
					?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                                    <a href="#">
                                        <div class="panel-content">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-user color-darker-2"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-darker-2">ClientsReview</h4>
                                                    <h1 class="title color-w"><?php 
						$sqll = "SELECT * FROM testimonial ORDER BY id DESC";
						$msg = $db->select($sqll);
						if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo $count;
                        }else{
                            echo "";
                        }					
						
					?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                                    <a href="#">
                                        <div class="panel-content">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <span class="icon fa fa-envelope color-lighter-1"></span>
                                                </div>
                                                <div class="col-xs-8">
                                                    <h4 class="subtitle color-lighter-1">Total Messages</h4>
                                                    <h1 class="title color-light"><?php 
						$sqll = "SELECT * FROM messages ORDER BY id DESC";
						$msg = $db->select($sqll);
						if ($msg) {
                            $count = mysqli_num_rows($msg);
                            echo $count;
                        }else{
                            echo "";
                        }					
						
					?></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           
                  

                                  
                            </div>
                           </div>
                        </div>
                        <!--STRIPE-->
                    </div>


             </div>
                    </div>
















         
       
            
 <?php include 'inc/footer.php'; ?>