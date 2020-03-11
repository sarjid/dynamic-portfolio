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
    if (!isset($_GET['seenid']) || $_GET['seenid'] == 'NULL') {
        echo "<script> window.location ='allmsg.php'; </script>";            
    }else {
        $seenid = $_GET['seenid'];
        // delete image 
        $sql = "UPDATE  messages SET  status = '1' WHERE id = '$seenid'";
        $result = $db->update($sql);
  
        if ($result) {
            
            echo "<script> window.location ='allmsg.php'; </script>";                      
            
        }else {
            echo "<script>alert('Message Not Seen ...'); </script>";
            echo "<script> window.location ='allmsg.php'; </script>";   
            
        }
    }
?>


  