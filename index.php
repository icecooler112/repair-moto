<?php session_start(); ?>
<?php include_once('include/connect.php'); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>
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
              <li class="active">
                  <a href="index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
              </li>
                <li>
                    <a href="user_list.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
                </li>
                <li>
                    <a href="rp_history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
                </li>
                <li>
                    <a href="product.php"><i class="fas fa-box"></i> ข้อมูลสินค้า</a>
                </li>
                <li>
                    <a href="dl_shop.php"><i class="fas fa-shopping-cart"></i> ข้อมูลผู้จำหน่ายสินค้า</a>
                </li>
                <li>
                    <a href="show.php" ><i class="fas fa-chart-pie mr-1"></i> รายงาน</a>
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
                    <div class="col-md-10 mx-auto">
                        <div class="card">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="card-header text-center">
                                    กรอกข้อมูลการซ่อม
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="pname" class="col-sm-3 col-form-label">ชื่อ - สกุล</label>
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
                                    <div class="form-group row">
                                        <label for="dl_insurance" class="col-sm-3 col-form-label">การรับประกันสินค้า</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="dl_insurance" name="dl_insurance" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dl_date" class="col-sm-3 col-form-label">วันที่รับสินค้ามา</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="dl_date" name="dl_date" required>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <input type="submit" name="submit" class="btn btn-outline-primary" value="ยืนยันการทำรายการ">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
