<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


<div class="content">
            <!-- content HEADER -->
            <!-- ========================================================= -->
            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Tables</a></li>
                        <li><a>Data-table</a></li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--SEARCHING, ORDENING & PAGING-->
            <div class="row animated fadeInRight">
                <div class="col-sm-12 col-md-10">
                    <h4 class="section-subtitle"></h4>
                    <div class="panel bt-md">
                        <div class="panel-content">

                        <div class="row">
                        
                        <div class="col-xs-6">
                                <h4>All Brand </h4>
                                <hr>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="addbrand.php " class="btn btn-primary">Add Brand</a>

                            </div>
                        </div>
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
						$qeury = "SELECT * FROM brand ORDER BY id DESC";
						$result = $db->select($qeury);
						if ($result !== false) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                        <img src="<?php echo $row ['image']; ?>" height="50px;" width="160px;"  alt="banner"/>
                                        </td>
                                       <td>
                                       <?php echo $frmt->formatDate($row['date']) ; ?>
                                       </td>
                                       
                                        <td>
                                              
                            <a href="?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>
                            <a href="?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></a>
                            <a href="delbrand.php?Del=<?php echo $row['id']; ?>" id="delete" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                            <?php 
								}
							}else {
								echo "No Data Found";
							}
						
						?>
                                          
               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
        <!-- RIGHT SIDEBAR -->

<?php include 'inc/footer.php'; ?>
  