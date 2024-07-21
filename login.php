<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$status=1; // Active or inActive
$sql ="SELECT * FROM admin WHERE UserName=:uname and Password=:password AND status=:status";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetch(PDO::FETCH_ASSOC);
$_SESSION['role']=$results['role'];
$_SESSION['UserName']=$results['UserName'];

if($query->rowCount() > 0)
{
    $_SESSION['alogin']=$_POST['username'];
    
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin Login </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/icheck/skins/flat/blue.css">
    <!-- <link rel="stylesheet" href="css/main.css" media="screen"> -->
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<style>
    .box12{
        display: none;
    }
    .panel{
        border: 2px solid #DDD;
        padding: 26px;
        background: #f3f3f3;
    }
    img{
        width: 140px;
        max-width: 100%;
        border-radius: 110px;
    }
</style>
<body class="">
    <div class="main-wrapper">

        <div class="login-bg-color bg-black-300">
            <div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 3%">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel login-box">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <img src="./img/school_logo.jpg" alt="LOGO">
                                <h4>Najah Primary & Intermediate School</h4>
                                <h5> Bosaso, Puntland, Somalia </h5>
                            </div>
                        </div>

                        <div class="panel-body p-20">
                        
                            <form  method="post">
                                <div class="admin">
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Enter User Name" autocomplete="off" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter Password" autocomplete="off" name="password">
                                    </div>
                                    <div class="form-group mt-20">
                                        <div class="">
                                            <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">
                                                Login
                                                <span class="btn-label btn-label-right">
                                                    <!-- <i class="fa fa-check"></i> -->
                                                </span>
                                            </button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                            

                        </div>
                    </div>
                    <!-- /.panel -->
                
                </div>
                <!-- /.col-md-6 col-md-offset-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/icheck/icheck.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
    $(function() {
        $('input.flat-blue-style').iCheck({
            checkboxClass: 'icheckbox_flat-blue'
        });
    });
    </script>


    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>