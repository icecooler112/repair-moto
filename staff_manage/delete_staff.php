
<?php include_once('../include/connect.php'); ?>
<?php
 $id = $_GET['id'];
if (isset($id)){
        $sql = "DELETE FROM staff WHERE `staff`.`staff_id` = '".$id."'";
        $result = $conn->query($sql);

if ($conn->affected_rows){
    echo '<script> alert("สำเร็จ! ทำการลบข้อมูลพนักงานออกเรียบร้อย.")</script>';
    header('Refresh:1; url=../staff.php');
}else{
    echo '<script> alert("ล้ล้มเหลว! ไม่สามารถลบข้อมูลพนักงานออกได้ Sorry!")</script>';
    header('Refresh:1; url=staff_create.php');
}


}else{
    header('Refresh:0; url=../staff.php');
}

?>
