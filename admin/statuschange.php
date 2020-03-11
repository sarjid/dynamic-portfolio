<?php 
    include '../lib/session.php';
    session::checksession();
?>

<?php 

include '../lib/Database.php';
include '../config/config.php';
include '../helpers/format.php';

$db = new Database;

?>

<?php 
    if (!isset($_GET['status']) || $_GET['status'] == 'NULL') {
        echo "<script> window.location ='alleducation.php'; </script>";            
    }else {
      echo  $status = $_GET['status'];
           }
           
          //  if ($status ==1) {
          //   $query = "UPDATE tbl_self SET 
          //   status  = '0' ";      
          //   $updated_rows = $db->update($query);
          //   if ($updated_rows) {
          //     echo "<script>alert('Status Deactive..'); </script>";
          //     echo "<script> window.location ='alleducation.php'; </script>";   
              
          //   }
             
          //  }else{

          //   $query = "UPDATE education SET 
          //   status  = '1' ";      
          //   $updated_rows = $db->update($query);
          //   if ($updated_rows) {
          //     echo "<script>alert('Status Activated..'); </script>";
          //     echo "<script> window.location ='alleducation.php'; </script>";   
              
          //   }

          //  }
       

        // $Delquery = "DELETE FROM tbl_post WHERE id = '$id'";
        // $deldata = $db->delete($Delquery);
        // if ($deldata) {
        //     echo "<script>alert('Post Deleted Successfully...'); </script>";
        //     echo "<script> window.location ='postlist.php'; </script>";                      
            
        // }else {
        //     echo "<script>alert('Post Not Deleted ...'); </script>";
        //     echo "<script> window.location ='postlist.php'; </script>";   
            
        // }
    
?>


  