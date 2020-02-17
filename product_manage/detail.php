<?php session_start();
?>
<?php include("../include/connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repair history</title>
<!-- Our Custom CSS -->
<link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
            <?php if(isset($_SESSION['id'])) { ?>
            <center><h5><?php echo $_SESSION["First_Name"];?> <?php echo $_SESSION["Last_Name"];?></h5></center>
            <center><h6>สถานะ : <?php echo $_SESSION["status"];?></h6></center>
            <?php }else header("location:login.php"); ?>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="../index.php">รายงาน</a>
                </li>
                <li  >
                    <a href="../user_list.php">ข้อมูลลูกค้า</a>
                </li>
                <li>
                    <a href="../rp_history.php">ประวัติการซ่อม</a>
                </li>
                <li class="active">
                    <a href="../product.php">ข้อมูลสินค้า</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#LogoutModal">
              <i class="material-icons">ออกจากระบบ</i>
            </a>
                </li>
            </ul>
        </nav>

        <div id="LogoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">ออกจากระบบ ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h1 style="font-size:5.5rem;"><i class="fa fa-sign-out text-danger" aria-hidden="true"></i></h1>
          <p class="text-dark">คุณต้องการออกจากระบบใช่หรือไม่?</p>
      </div>
      <div class="modal-footer">
      <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">


                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <p><h3>ข้อมูลสินค้า</h3></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
                            $id = $_GET['id'];
                             $sql = "SELECT product.id, product.pname, product.p_id, product.price, product.numproduct, product.detail, product.image, dealer.dl_nameshop, dealer.dl_phone, product.dl_insurance, product.dl_date
                                     FROM `product`
                                     INNER JOIN dealer
                                     ON dealer.dl_id = product.dl_id WHERE id = '" . $id . "' ";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $_SESSION['image'] = $row['image'];

                                ?>
            <div class="card-header text-center">
                            รายละเอียดสินค้า
                        </div>
            <div class="card-body ">
                            <div class="form-group text-center">
                            <div class="report_name_th">
                            <?php if(isset($_SESSION['id'])) { ?>
                            <img src="../upload/<?php echo $_SESSION['image'];?>" class="figure-img img-fluid rounded" width="300" height="300" alt="">
                            <?php } ?></div>
                            <div class="report_name_th"><b>รหัสสินค้า </b> : <label><?php echo $row['p_id']; ?></label></div>
                            <div class="report_name_th"><b>ชื่อสินค้า </b> : <label><?php echo $row['pname']; ?></label></div>
                            <div class="report_name_th"><b>ราคาสินค้าต่อชิ้น </b> : <label><?php echo $row['price']; ?> <b>บาท</b></label></div>
                            <hr>
                            <div class="report_name_th"><b>รายละเอียดของสินค้า </b> : <label><?php echo $row['detail']; ?></label></div>
                            <hr>
                            <div class="card-header text-center">
                                รายละเอียดร้านค้าที่จำหน่าย
                            </div>
                                <div class="card-body ">
                                    <div class="form-group text-center">
                                    <div class="report_name_th">
                            <div class="report_name_th"><b>ชื่อร้านค้าที่จำหน่าย </b> : <label><?php echo $row['dl_nameshop']; ?></label></div>
                            <div class="report_name_th"><b>เบอร์โทรศัพท์ร้านค้า </b> : <label><?php echo $row['dl_phone']; ?></label></div>
                            <div class="report_name_th"><b>การรับประกันสินค้า</b> : <label><?php echo $row['dl_insurance']; ?></label></div>
                            <div class="report_name_th"><b>วันที่รับสินค้ามา</b> : <label><?php echo $row['dl_date']; ?></label></div>
            <div class="card-footer text-center">
                            <a class="btn btn-outline-danger" href="../product.php">ย้อนกลับ</a>

                        </div>

                    </div>
                    <?php } ?>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
