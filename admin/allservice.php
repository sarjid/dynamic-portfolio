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
                            </i><a href="javascript:avoid(0)">Brand</a></li>
                            <li><i class=" " aria-hidden="true">
                            </i><a href="javascript:avoid(0)">Manage Brand</a></li>
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
                                            <h4>All Services </h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="addservice.php " class="btn btn-primary">Add Service</a>

                                        </div>
                                    </div>
                          <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                              <thead>
                                   <tr>
                                        <th>Sl No</th>
                                         <th>icon</th>
                                         <th>Service Name</th>
                                         <th>Description</th>
                                         <th>Status</th>
                                         <th>Action</th>

                                      </tr>
                                 </thead>
                                     <tbody>
                                     
                                        		
					<?php 
						$qeury = "SELECT * FROM services ORDER BY id DESC";
						$result = $db->select($qeury);
						if ($result !== false) {
							$i = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;
								
						
					?>
                                            <tr>
                                                <td><?php  echo $i;?></td>
                                                <td>
                                                  <i class="<?php echo $row['icon'];?>">
                                                </i> </td>
                                                <td><?php echo $row['title'] ?></td>
                                                <td><?php echo $frmt->textshorten($row['descp'],15); ?></td>
                                                <td>
                                                <div class="checkbox">
                                      <label>
             
        <input type="checkbox" data-size="mini" id="brandStatus"  data-id=" " data-toggle="toggle" data-on="Active " data-off="Inactive" <?php if($row['status'] ==1 ){
          echo "checked";
        } ?> >
       
                                                         
                                                        </label>
                                                      </div> 
                                                
                                                </td>

                                              <td>
                                                    
                                                    <a href=" {{URL::to('brand/edit/'.$row->id)}} " class="btn btn-warning btn-xs"> <i class="fa fa-pencil"></i></a>
                                                    <a href="?del=<?php echo $row['id']; ?> " id="delete" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i></a>

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
  