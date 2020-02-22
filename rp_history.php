<?php session_start();
?>
<?php include("include/connect.php"); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Repair history</title>
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
                  <a href="index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
              </li>

                <li>
                    <a href="user_list.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
                </li>
                <li>
                    <a href="staff.php"><i class="fas fa-user-cog"></i> ข้อมูลพนักงาน</a>
                </li>
                <li  class="active">
                    <a href="rp_history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
                </li>
                <li >
                    <a href="product.php"><i class="fas fa-box"></i> ข้อมูลสินค้า</a>
                </li>
                <li>
                    <a href="dl_shop.php"><i class="fas fa-truck"></i> ข้อมูลผู้จำหน่ายสินค้า</a>
                </li>
                <li >
                    <a href="show.php"><i class="fas fa-chart-line"></i> รายงาน</a>
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
                                <p><h3>จัดการข้อมูลการซ่อม</h3></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <form class="form-inline" method="GET" id="form" action="">
            <input class="form-control w-50 p-2 ml-1" name="search" type="search" value="" placeholder="กรอกชื่อลูกค้าที่ต้องการค้นหา" aria-label="Search">
            <button class="btn btn-outline-primary ml-3" type="submit"><i class="fas fa-search"></i> Search </button> <button class="btn btn-outline-danger ml-3" action="product.php" type="submit"><i class="fas fa-eraser"></i> Reset</button>

              </form>
  <table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ</th>
        <th scope="col">เลขทะเบียนรถ</th>
          <th scope="col">วันและเวลาที่ซ่อม</th>
      <th scope="col">ดูเพิ่ม</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>

    </tr>
  </thead>
  <tbody>
    <?php
             $search=isset($_GET['search']) ? $_GET['search']:'';

             $sql = "SELECT user.user_id,user.fullname,history.h_id,history.user_id,history.bike_id,history.datetime,history.h_price
             FROM user
             INNER JOIN history
             ON user.user_id = history.user_id WHERE fullname LIKE '%$search%'";
             $result = $conn->query($sql);
             $num = 0;
             while ($row = $result->fetch_assoc()) {
               $num++;
               ?>
            <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $row['fullname']; ?></td>
              <td><?php echo $row['bike_id']; ?></td>
              <td><?php echo $row['datetime']; ?></td>
              <td>
                <a href="../create_subject/update_subject.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary ">
                  <i class="fas fa-eye"></i> ดูเพิ่ม
                </a>
                </td>
              <td>
                <a href="../create_subject/update_subject.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-warning ">
                  <i class="fas fa-edit"></i> แก้ไข
                </a>
              </td>
              <td>
                <?php if ($row['h_id']) { ?>
                  <a href="#" onclick="deleteItem(<?php echo $row['h_id']; ?>);" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-trash-alt"></i> ลบ
                  </a>
                <?php } ?>
              </td>
          <?php } ?>

  </tbody>
</table>

<script>
      function deleteItem(id) {
        if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่') == true) {
          window.location = `user_manage/delete_user.php?id=${id}`;
        }
      };
    </script>
</div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
