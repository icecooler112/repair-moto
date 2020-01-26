<?php session_start(); ?>
<?php include_once('include/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>
<body>
    <?php
        require_once('include/connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if (isset($_POST['submit'])) { 
            /**
             * กำหนดตัวแปรเพื่อมารับค่า
             */
            $username =  $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            /**
             * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
             * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
             */
            $sql = "SELECT * FROM `admin_lg` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $result = $conn->query($sql);

            /**
             * ตรวจสอบการเข้าสู่ระบบ
             */
            if($result->num_rows > 0){
                /**
                 * แสดงข้อมูลของ user 
                 * เก็บข้อมูลเข้าสู่ session เพื่อนำไปใช้งาน 
                 */
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['First_Name'] = $row['First_Name'];
                $_SESSION['Last_Name'] = $row['Last_Name'];
                $_SESSION['status'] = $row['status'];
                header('location:index.php');
            }else{
              echo "<script>";
        echo "alert(\" Username หรือ  Password ของคุณไม่ถูกต้อง\");";
        echo "</script>";
        header('Refresh:0; url=login.php');
            } 
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST">           
                        <div class="card-header text-center">
                        <h3><a><b>Admin</b>Login</a></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>    
                            </div>
                        </div>
                        <div class="card-footer text-center col-12 p-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

</body>

</html>