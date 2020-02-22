<?php include_once('../include/connect.php'); ?>
<?php
 $id = $_GET['id'];
if (isset($id)){
        $sql = "DELETE FROM product WHERE `product`.`p_id` = '".$id."'";
        $result = $conn->query($sql);

if ($conn->affected_rows){
    echo '<script> alert("ลบข้อมูลสำเร็จ!")</script>';
    header('Refresh:0; url=../product.php');
}else{
    echo '<script> alert("ไม่สามารถลบข้อมูลออกได้ Sorry!")</script>';
    header('Refresh:0; url=../product.php');
}


}else{
    header('Refresh:0; url=../product.php');
}

?>
