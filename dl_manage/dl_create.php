<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข้อมูลลูกค้า</title>
</head>
<body>

    <?php
        require_once('../include/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){

                $sql = "INSERT INTO `dealer` (`dl_id`, `dl_nameshop`, `dl_phone`)
                        VALUES (NULL, '".$_POST['dl_nameshop']."', '".$_POST['dl_phone']."');";
                $result = $conn->query($sql);
                /**
                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                 */
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show test-center" role="alert">
                    <strong>สำเร็จ!</strong>ทำการเพิ่มข้อมูลลูกค้าเรียบร้อย.
                  </div>';
                    header('Refresh:1; url=../dl_shop.php');
                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show test-center" role="alert">
                    <strong>ล้มเหลว!</strong>ไม่สามารถทำการกรอกข้อมูลลูกค้าได้ กรุณาลองใหม่อีกครั้ง.';
                    header('Refresh:1; url=dl_create.php');
                }
            }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            กรอกข้อมูลร้านค้าผู้จำหน่ายสินค้า
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="dl_nameshop" class="col-sm-3 col-form-label">ชื่อร้านค้าผู้จำหน่าย</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="dl_nameshop" name="dl_nameshop" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dl_phone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="dl_phone" name="dl_phone" required>
                                </div>
                            </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="ยืนยัน">
                            <a class="btn btn-outline-danger" href="../dl_shop.php">ย้อนกลับ</a>
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
