<?php require_once('../include/connect.php');?>
<?php

$id = $_GET['id'];
$sql = "SELECT  `id`, `pname`, `p_id`, `price`, `numproduct`, `detail` FROM `product`  WHERE id = '" . $id . "' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูลสินค้า</title>
</head>
<?php
if(isset($_POST['submit'])){
$sql = "UPDATE `product` 
        SET `pname` = '".$_POST['pname']."',
            `p_id` = '".$_POST['p_id']."',
            `price` = '".$_POST['price']."',
            `numproduct` = '".$_POST['numproduct']."',
            `detail` = '".$_POST['detail']."'
         WHERE product.`id` = '".$_POST['id']."';";


$result = $conn->query($sql);
if($result){
     echo '<script> alert("แก้ไขข้อมูลสินค้าสำเร็จ!")</script>'; 
    
    header('Refresh:0; url=../product.php');
}else{
    echo '<script> alert("แก้ไขข้อมูลสินค้าไม่สำเร็จ!")</script>'; 
    
    header('Refresh:0; url=../product.php');
}

}
    
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
                            แก้ไขข้อมูลสินค้า
                        </div>
                        <div class="card-body">
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" hidden>
                        </div>
                            
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $row['pname']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="p_id" class="col-sm-3 col-form-label">รหัสสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="p_id" name="p_id" value="<?php echo $row['p_id']; ?>" required>
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ราคาสินค้าต่อชิ้น</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numproduct" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numproduct" name="numproduct" value="<?php echo $row['numproduct']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail" class="col-sm-3 col-form-label">Detail</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="detail" name="detail" value="<?php echo $row['detail']; ?>" required>
                                </div>
                            </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="ยืนยัน">
                            <a class="btn btn-outline-danger" href="../user_list.php">ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->       
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>