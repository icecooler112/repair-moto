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
        require_once('../include/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
            
                $sql = "INSERT INTO `product` (`id`, `pname`, `p_id`, `price`, `numproduct`, `detail`) 
                        VALUES (NULL, '".$_POST['pname']."', '".$_POST['p_id']."', '".$_POST['price']."', '".$_POST['numproduct']."', '".$_POST['detail']."');";
                $result = $conn->query($sql);
                /**
                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                 */                
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show test-center" role="alert">
                    <strong>สำเร็จ!</strong>ทำการเพิ่มข้อมูลสินค้าเรียบร้อย.
                  </div>';
                    header('Refresh:1; url=../product.php');
                }else{
                    echo '<script> alert("ไม่สามารถเพิ่มข้อมูลสินค้านี้ได้ Sorry!")</script>';
                }
            }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
                            กรอกข้อมูลสินค้า
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pname" name="pname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="p_id" class="col-sm-3 col-form-label">รหัสสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="p_id" name="p_id" required>
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ราคา</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" name="price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numproduct" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numproduct" name="numproduct" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail" class="col-sm-3 col-form-label" >Detail</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="detail" name="detail" rows="4" required></textarea>
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

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->       
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    
</body>
</html>