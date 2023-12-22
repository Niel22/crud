<?php 
include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE `id`='$id'";
    $result = $conn->query($sql);

    if($result){
        header('location:view.php');
    }else {
        echo "Error ". $sql . "<br>" . $conn->error;
    }
}
?>