
<?php include_once('../include/connect.php'); ?>
<?php
 $id = $_GET['id'];
if (isset($id)){
        $sql = "DELETE FROM user WHERE `user`.`id` = '".$id."'";
        $result = $conn->query($sql);

if ($conn->affected_rows){
    echo '<div class="alert alert-success alert-dismissible fade show test-center" role="alert">
                    <strong>สำเร็จ!</strong>ทำการเพิ่มข้อมูลลูกค้าเรียบร้อย.
                  </div>'; 
    header('Refresh:1; url=../user_list.php');
}else{
    echo '<script> alert("ไม่สามารถลบข้อมูลออกได้ Sorry!")</script>'; 
    header('Refresh:1; url=../user_list.php');
}


}else{
    header('Refresh:0; url=../user_list.php');
}

?>