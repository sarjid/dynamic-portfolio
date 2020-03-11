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
                            </i><a href="javascript:avoid(0)">All Message</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">

                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-md-offset-0">
                            <div class="panel b-primary bt-md">
                                <div class="panel-content">
                                <?php 

if (isset($_GET['del'])) {
    $id = $_GET['del']; 


$sql = " DELETE FROM services WHERE id ='$id' "; 
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
                                            <h4>All Message </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="draf.php " class="btn btn-primary">Draf Box</a>

                                        </div>
                                    </div>
                          <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                        <th>Sl No</th>
                                         <th>Name</th>
                                         <th>Email</th>
                                         <th>Message</th>
                                     
                                         <th>Action</th>

                                      </tr>
                                 </thead>
                                     <tbody>
                                     
                                        		
					<?php 
						$qeury = "SELECT * FROM Messages WHERE status = '0' ORDER BY id DESC";
						$result = $db->select($qeury);
						if ($result !== false) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;
								
						
					?>
                                            <tr>
                                                <td><?php  echo $i;?></td>
                                                
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $frmt->textshorten($row['message'],15); ?></td>
                                               
                                               

                                              <td>
                                              <a href="viewmsg.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>
                                                
                                         <a href="replymsg.php?id=<?php echo $row['id']; ?> "  class="btn btn-secondery btn-xs">Reply </a>
                                         <a href="seen.php?seenid=<?php echo $row['id']; ?>"class="btn btn-success btn-xs"><i class="fa fa-check"></i> </a>

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
  