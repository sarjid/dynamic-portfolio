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
                            <li><i class="fa fa-home" aria-hidden="true">
                            </i><a href=" {{route('dashboard')}} ">Dashboard</a></li>
                            <li><i class="" aria-hidden="true">
                            </i><a href="javascript:avoid(0)">Message</a></li>
                            <li><i class=" " aria-hidden="true">
                            </i><a href="javascript:avoid(0)">Inbox</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">
                                    <!--messages-->
                                    <div class="notice" id="messages-notice">
                        
                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-comments" aria-hidden="true"></i> Messages</h3>
                                <span class="badge x-danger b-rounded"></span>
                            </div>
                            <?php 
						$qeury = "SELECT * FROM messages WHERE status = '0' ORDER BY id DESC ";
						$result = $db->select($qeury);
						if ($result !== false) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;								
						
					?>
                            <div class="drop-content">
                                <div class="widget-list list-left-element">
                                    <ul>
                                        <li>
                                            <a href="viewmsg.php?id=<?php echo $row['id']; ?> " >
                                                <div class="left-element"><img alt="profile photo" src="assets/images/avatar/message.png" /></div>
                                                <div class="text">
                                                    <span class="title"><?php echo $row['name'] ?></span>
                                                    <span class="subtitle"><?php echo $frmt->textshorten( $row['message'],25); ?></span>
                                                </div>
                                            </a>
                                      
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php }}?>
                            <div class="drop-footer">
                                <a href="allmsg.php">See all messages</a>
                            </div>
                        </div>
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
  