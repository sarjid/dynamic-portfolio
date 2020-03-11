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
    if (!isset($_GET['Del']) || $_GET['Del'] == 'NULL') {
        echo "<script> window.location ='alltestimonial.php'; </script>";            
    }else {
        $id = $_GET['Del'];
        // delete image 
        $sql = "SELECT * FROM testimonial WHERE id = '$id'";
        $result = $db->select($sql);
        if ($result) {
           while ($getImg = mysqli_fetch_assoc($result)) {
                    $imgDel = $getImg['image'];
                    unlink($imgDel);
           }
        }

        $Delquery = "DELETE FROM testimonial WHERE id = '$id'";
        $deldata = $db->delete($Delquery);
        if ($deldata) {
            
            echo "<script> window.location ='alltestimonial.php'; </script>";                      
            
        }else {
            echo "<script>alert('Post Not Deleted ...'); </script>";
            echo "<script> window.location ='alltestimonial.php'; </script>";   
            
        }
    }
?>


  