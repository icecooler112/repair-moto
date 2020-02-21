
<?php include_once('../include/connect.php'); ?>
<?php
 $id = $_GET['id'];
if (isset($id)){
        $sql = "DELETE FROM user WHERE `user`.`user_id` = '".$id."'";
        $result = $conn->query($sql);

if ($conn->affected_rows){
  echo '<script> alert("สำเร็จ! ทำการลบข้อมูลลูกค้าออกเรียบร้อย.")</script>';
  header('Refresh:1; url=../user_list.php');
}else{
  echo '<script> alert("ล้ล้มเหลว! ไม่สามารถลบข้อมูลลูกค้าออกได้ Sorry!")</script>';
  header('Refresh:1; url=../user_list.php');
}


}else{
  header('Refresh:0; url=../user_list.php');
}

?>
