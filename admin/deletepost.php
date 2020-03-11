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
    if (!isset($_GET['Delid']) || $_GET['Delid'] == 'NULL') {
        echo "<script> window.location ='allwork.php'; </script>";            
    }else {
        $id = $_GET['Delid'];
        // delete image 
        $sql = "SELECT * FROM works WHERE id = '$id'";
        $result = $db->select($sql);
        if ($result) {
           while ($getImg = mysqli_fetch_assoc($result)) {
                    $imgDel = $getImg['image'];
                    unlink($imgDel);
           }
        }

        $Delquery = "DELETE FROM works WHERE id = '$id'";
        $deldata = $db->delete($Delquery);
        if ($deldata) {
            
            echo "<script> window.location ='allwork.php'; </script>";                      
            
        }else {
            echo "<script>alert('Post Not Deleted ...'); </script>";
            echo "<script> window.location ='allwork.php'; </script>";   
            
        }
    }
?>


  