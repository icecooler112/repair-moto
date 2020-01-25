<?php include_once('../include/connect.php'); ?>

<?php
if(isset($_POST['submit'])){
$sql = "UPDATE `user` 
        SET `fullname` = '".$_POST['fullname']."',
            `idcard` = '".$_POST['idcard']."',
            `phone` = '".$_POST['phone']."',
            `email` = '".$_POST['email']."'
         WHERE user.`id` = '".$_POST['id']."';";


$result = $conn->query($sql);
if($result){
     echo '<script> alert("Finished Updating!")</script>'; 
    
    header('Refresh:0; url=../user_list.php');
}else{
    echo '<script> alert("Updating Error!")</script>'; 
    
    header('Refresh:0; url=../teacher');
}

}else{
    header('Refresh:0; url=../teacher');
}
    
?>