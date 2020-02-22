<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>
</head>

<body>
  <?php
  require_once('include/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน

      if(isset($_POST['submit'])){

              $sql = "INSERT INTO `history` (`user_id`, `bike_id`, `datetime`, `h_price`)
                      VALUES ('".$_POST['user_id']."', '".$_POST['bike_id']."', '".$_POST['datetime']."', '".$_POST['h_price']."');";
              $result = $conn->query($sql);
              /**
               * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
               */
              if($result){
                  echo '<div class="alert alert-success alert-dismissible fade show test-center" role="alert">
                  <strong>สำเร็จ!</strong>ทำการเพิ่มข้อมูลลูกค้าเรียบร้อย.
                </div>';
                  header('Refresh:1; url=index.php');
              }else{
                  echo '<div class="alert alert-danger alert-dismissible fade show test-center" role="alert">
                  <strong>ล้มเหลว!</strong>ไม่สามารถทำการกรอกข้อมูลลูกค้าได้ กรุณาลองใหม่อีกครั้ง.';
                  header('Refresh:1; url=index.php');
              }
          }

  ?>

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
              <li class="active">
                  <a href="index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
              </li>
                <li>
                    <a href="user_list.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
                </li>
                <li>
                    <a href="staff.php"><i class="fas fa-user-cog"></i> ข้อมูลพนักงาน</a>
                </li>
                <li>
                    <a href="rp_history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
                </li>
                <li>
                    <a href="product.php"><i class="fas fa-box"></i> ข้อมูลสินค้า</a>
                </li>
                <li>
                    <a href="dl_shop.php"><i class="fas fa-truck"></i> ข้อมูลผู้จำหน่ายสินค้า</a>
                </li>
                <li>
                    <a href="show.php" ><i class="fas fa-chart-line"></i> รายงาน</a>
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
                                <p><h4>เพิ่มข้อมูลการซ่อม</h4></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto mt-5">
                        <div class="card">
                            <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-header text-center">
                                    กรอกข้อมูลการซ่อม
                                </div>
                                  <div class="card-body">
                                <div class="form-group row">
                                    <label for="dl_id" class="col-sm-3 col-form-label">เลือกชื่อลูกค้า</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" id = "user_id" name="user_id" required>
                                              <option value="" disabled selected>----- กรุณาเลือก -----</option>
                                                <?php $sql = "SELECT * FROM user";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $row['user_id']; ?>"><?php echo $row["fullname"]; ?></option>
                                                          <?php } ?>
                                                          </select>
                                        <div class="invalid-feedback">
                                            กรุณาเลือกชื่อลูกค้า
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="bike_id" class="col-sm-3 col-form-label">เลขทะเบียนรถ</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bike_id" name="bike_id" required>
                                            <div class="invalid-feedback">
                                                กรุณากรอกเลขทะเบียน (ตัวอย่าง : กข 123 , 1กข 2222)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="datetime" class="col-sm-3 col-form-label">วันที่รับสินค้ามา</label>
                                        <div class="col-sm-9">
                                            <input type="datetime" class="form-control" id="datetime" value="<?php date_default_timezone_set('asia/bangkok'); echo date('d-m-y h:i:s');?>" name="datetime" required>
                                            <div class="invalid-feedback">
                                                กรุณาเลือกวันที่รับสินค้ามา (เดือน / วัน / ปี)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="h_price" class="col-sm-3 col-form-label">ราคารวม</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="h_price" name="h_price" required>
                                            <div class="invalid-feedback">
                                                กรุณากรอกราคารวม
                                            </div>
                                        </div>
                                    </div>
                                <div class="card-footer text-center">
                                    <input type="submit" name="submit" class="btn btn-outline-primary" value="ยืนยัน">
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
