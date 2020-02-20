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

                $sql = "INSERT INTO `staff` (`staff_id`, `staff_name`,`staff_address`, `staff_email`, `staff_phone`)
                        VALUES (NULL, '".$_POST['staff_name']."','".$_POST['staff_address']."','".$_POST['staff_email']."', '".$_POST['staff_phone']."');";
                $result = $conn->query($sql);
                /**
                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                 */
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show test-center" role="alert">
                    <strong>สำเร็จ!</strong>ทำการเพิ่มข้อมูลพนักงานเรียบร้อย.
                  </div>';
                    header('Refresh:1; url=../staff.php');
                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show test-center" role="alert">
                    <strong>ล้มเหลว!</strong>ไม่สามารถทำการกรอกข้อมูลพนักงานได้ กรุณาลองใหม่อีกครั้ง.';
                    header('Refresh:1; url=staff_create.php');
                }
            }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            กรอกข้อมูลพนักงาน
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="staff_name" class="col-sm-3 col-form-label">ชื่อ-สกุล</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="staff_name" name="staff_name" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อ-สกุล
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staff_address" class="col-sm-3 col-form-label">ที่อยู่</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="staff_address" name="staff_address" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกที่อยู่
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staff_email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="staff_email" name="staff_email" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกอีเมลล์ ตามรูปแบบที่กำหนด (@hotmail.com / @gmail.com)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staff_phone" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="staff_phone" onKeyUp="IsNumeric(this.value,this)"  name="staff_phone" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกเบอร์เบอร์โทรศัพท์
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="ยืนยัน">
                            <a class="btn btn-outline-danger" href="../staff.php">ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
            // ตรวจสอบการกรอกข้อมูลชนิดที่ไม่ช่ตัวเลข
            function IsNumeric(sText, obj) {
                var ValidChars = "0123456789";
                var IsNumber = true;
                var Char;
                for (i = 0; i < sText.length && IsNumber == true; i++) {
                    Char = sText.charAt(i);
                    if (ValidChars.indexOf(Char) == -1) {
                        IsNumber = false;
                    }
                }
                if (IsNumber == false) {
                    alert("กรุณากรอกเฉพาะตัวเลข 0-9");
                    obj.value = sText.substr(0, sText.length - 10);
                }
            }
        </script>
    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
