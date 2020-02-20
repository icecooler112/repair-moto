<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มข้อมูลสินค้า</title>
</head>
<body>
<?php
        include('../include/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
            $temp = explode('.',$_FILES['image']['name']);
            $new_name = round(microtime(true)) . '.' . end($temp);
            /**
             * ตรวจสอบเงื่อนไขที่ว่า สามารถย้ายไฟล์รูปภาพเข้าสู่ storage ของเราได้หรือไม่
             */
            if(move_uploaded_file($_FILES['image']['tmp_name'], '../upload/' .$new_name)){


                $sql = "INSERT INTO `product` (`id`, `pname`, `p_id`, `price`, `numproduct`, `detail`, `image`, `dl_insurance`,`dl_date`)
                        VALUES (NULL, '".$_POST['pname']."', '".$_POST['p_id']."', '".$_POST['price']."', '".$_POST['numproduct']."', '".$_POST['detail']."' , '". $new_name."','".$_POST['dl_insurance']."','".$_POST['dl_date']."');";
                $result = $conn->query($sql);

                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show test-center" role="alert">
                    <strong>สำเร็จ!</strong>ทำการเพิ่มข้อมูลสินค้าเรียบร้อย.
                  </div>';
                    header('Refresh:1; url=../product.php');
                }else{
                  echo '<div class="alert alert-danger alert-dismissible fade show test-center" role="alert">
                  <strong>ล้มเหลว!</strong>การเพิ่มข้อมูลสินค้าไม่สำเร็จ.
                </div>';

                }
            }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
                        <div class="card-header text-center">
                            กรอกข้อมูลสินค้า
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pname" name="pname" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="p_id" class="col-sm-3 col-form-label">รหัสสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="p_id" name="p_id" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกรหัสสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ราคา</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" name="price" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกราคาสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numproduct" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numproduct" name="numproduct" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกจำนวนสินค้าที่มี
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail" class="col-sm-3 col-form-label" >Detail</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="detail" name="detail" rows="4" required></textarea>
                                    <div class="invalid-feedback">
                                        กรุณากรอกรายละเอียดสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dl_insurance" class="col-sm-3 col-form-label">การรับประกันสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="dl_insurance" name="dl_insurance" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกการรัการรับประกันสินค้า เช่น 1ปี หรือ 1เดือน (หากไม่มีการรับประกันให้ใส่ 0 )
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dl_date" class="col-sm-3 col-form-label">วันที่รับสินค้ามา</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="dl_date" name="dl_date" required>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวันที่รับสินค้ามา (เดือน / วัน / ปี)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">อัพโหลดรูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image" name="image" required>
                                    <div class="invalid-feedback">
                                        กรุณาใส่รูปภาพ
                                    </div>
                                </div>

                            </div>




                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="ยืนยัน">
                            <a class="btn btn-outline-danger" href="../product.php">ย้อนกลับ</a>
                        </div>

                    </form>
                </div>
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
