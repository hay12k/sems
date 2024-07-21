<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])== '')    {
    header("Location: index.php");
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Result</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
    img {
        width: 100px;
        max-width: 100%;
        border-radius: 110px;
        margin: 0px auto 0px;
        display: flex;
    }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="content-wrapper">
            <div class="content-container">


                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">

                        <!-- /.row -->

                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">

                            <div class="row">



                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <?php
// code Student Data
$rollid=$_POST['rollid'];
$classid=$_POST['class'];
$_SESSION['rollid']=$rollid;
$_SESSION['classid']=$classid;
$qery = "SELECT   students_table.StudentName,students_table.RollId,students_table.RegDate,students_table.StudentId,students_table.Status,class_table.ClassName,class_table.Section from students_table join class_table on class_table.id=students_table.ClassId where students_table.RollId=:rollid and students_table.ClassId=:classid ";
$stmt = $dbh->prepare($qery);
$stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$stmt->bindParam(':classid',$classid,PDO::PARAM_STR);
$stmt->execute();
$resultss=$stmt->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($stmt->rowCount() > 0)
{
foreach($resultss as $row)
{   ?>

                                                <img src="./img/school_logo.jpg" alt="LOGO">
                                                <h3 class="title" align="center"> Najah Primary & Intermediate School
                                                </h3>
                                                <h6 class="" align="center" style="margin: 0 !important; padding: 0;">
                                                    Bosaso, Puntland, Somalia
                                                </h6>
                                                <p><b>Student Name :</b> <?php echo htmlentities($row->StudentName);?>
                                                </p>
                                                <p><b>Student Roll Id :</b> <?php echo htmlentities($row->RollId);?>
                                                <p><b>Student Class:</b>
                                                    <?php echo htmlentities($row->ClassName);?>(<?php echo htmlentities($row->Section);?>)
                                                    <?php }

    ?>
                                            </div>
                                            <div class="panel-body p-20">







                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Subject</th>
                                                            <th>Marks</th>
                                                        </tr>
                                                    </thead>




                                                    <tbody>
                                                        <?php                                              
// Code for result

 $query ="select t.StudentName,t.RollId,t.ClassId,t.marks,SubjectId,subject_table.SubjectName from (select sts.StudentName,sts.RollId,sts.ClassId,tr.marks,SubjectId from students_table as sts join  result_table as tr on tr.StudentId=sts.StudentId) as t join subject_table on subject_table.id=t.SubjectId where (t.RollId=:rollid and t.ClassId=:classid)";
$query= $dbh -> prepare($query);
$query->bindParam(':rollid',$rollid,PDO::PARAM_STR);
$query->bindParam(':classid',$classid,PDO::PARAM_STR);
$query-> execute();  
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($countrow=$query->rowCount()>0)
{ 

foreach($results as $result){

    ?>

                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt);?></th>
                                                            <td><?php echo htmlentities($result->SubjectName);?></td>
                                                            <td><?php echo htmlentities($totalmarks=$result->marks);?>
                                                            </td>
                                                        </tr>
                                                        <?php 
$totlcount+=$totalmarks;
$cnt++;}
?>
                                                        <tr>
                                                            <th scope="row" colspan="2">Total Marks</th>
                                                            <td><b><?php echo htmlentities($totlcount); ?></b> out of
                                                                <b><?php echo htmlentities($outof=($cnt-1)*100); ?></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="2">Percntage</th>
                                                            <td><b><?php echo  htmlentities($totlcount*(100)/$outof); ?>
                                                                    %</b></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row" colspan="2">Print Result</th>
                                                            <!-- <td><b><a href="download-result.php">Download </a> </b></td> -->
                                                            <td><b><a href="#" onclick="print()"> Print </a> </b></td>
                                                        </tr>

                                                        <?php } else { ?>
                                                        <div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Notice!</strong> Your result not declare yet
                                                            <?php }
?>
                                                        </div>
                                                        <?php 
 } else
 {?>

                                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                                            strong> Error! </strong>
                                                            <?php
echo htmlentities("Invalid Roll Id");
 }
?>
                                                        </div>



                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <a href="view_result.php"> Back to Home</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                    </section>
                    <!-- /.section -->

                </div>
                <!-- /.main-page -->


            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
    $(function($) {

    });
    </script>


</body>

</html>
<?php } ?>