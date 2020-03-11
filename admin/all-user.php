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
                            </i><a href="javascript:avoid(0)">User</a></li>
                            <li><i class=" " aria-hidden="true">
                            </i><a href="javascript:avoid(0)">All User</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-md-offset-2">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">
                                <?php 

if (isset($_GET['deluser'])) {
    $id = $_GET['deluser']; 


$sql = " DELETE FROM tbl_users WHERE id ='$id' "; 
$del = $db->delete($sql);

if ($del !== false) {
     $submitsucc = '<h3 style="color: green;"> Delete Success..!</h3>';
}else {
     $submitsucc = '<h3 style="color: Red;">Warning Delete Failed..!</h3>';
    }
}

?>

<?php if (isset($submitsucc)) {
    echo $submitsucc;
} ?>
                                    <div class="row">
     
                                        <div class="col-xs-6">
                                            <h4>Manage Brand</h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="adduser.php " class="btn btn-primary">Add User</a>

                                        </div>
                                    </div>
                          <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                        <th>Sl No</th>
                                         <th>Username</th>
                                         <th>Email</th>
                                         <th>Role</th>
                                         <th>Action</th>

                                      </tr>
                                 </thead>
                                     <tbody>
                                     
                                        		
					<?php 
						$qeury = "SELECT * FROM tbl_users ORDER BY id";
						$result = $db->select($qeury);
						if ($result !== false) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;
								
						
					?>
                                            <tr>
                                                <td><?php  echo $i;?></td>
                                                <td><?php echo $row['username']; ?> </td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['username']; ?> </td>
                                              <td>
                                                    
                                                    <a href=" {{URL::to('brand/edit/'.$row->id)}} " class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></a>
                                                    <a href="?deluser=<?php echo $row['id']; ?> " id="delete" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>

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
                        <!--STRIPE-->
                    </div>
                    



                    </div>

                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>

<?php include 'inc/footer.php'; ?>
  