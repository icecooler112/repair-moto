<?php require_once('../include/connect.php');?>
<?php

$id = $_GET['id'];
$sql = "SELECT  `staff_id`, `staff_name`, `staff_address`, `staff_email`, `staff_phone` FROM `staff`  WHERE staff_id = '" . $id . "' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข้อมูลลูกค้า</title>

</head>
<?php
if(isset($_POST['submit'])){
$sql = "UPDATE `staff`
        SET `staff_name` = '".$_POST['staff_name']."',
            `staff_address` = '".$_POST['staff_address']."',
            `staff_email` = '".$_POST['staff_email']."',
            `staff_phone` = '".$_POST['staff_phone']."'
         WHERE staff.`staff_id` = '".$_POST['staff_id']."';";


$result = $conn->query($sql);
if($result){
     echo '<script> alert("สำเร็จ! แก้ไขข้อมูลพนักงานเรียบร้อย")</script>';

    header('Refresh:0; url=../staff.php');
}else{
    echo '<script> alert("ล้มเหลว! แก้ไขข้อมูลพนักงานไม่สำเร็จ Sorry!")</script>';

    header('Refresh:0; url=staff.php');
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
                            กรอกข้อมูลสมัครสมาชิก
                        </div>
                        <div class="card-body">
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" hidden>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fullname" class="col-sm-3 col-form-label">ชื่อ-สกุล</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="idcard" class="col-sm-3 col-form-label">รหัสบัตรปรจำตัวประชาชน</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="idcard" name="idcard" value="<?php echo $row['idcard']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
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
