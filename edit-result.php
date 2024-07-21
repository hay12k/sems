<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])== false)    {   
    header("Location: index.php"); 
    }
    else{

$stid=intval($_GET['stid']);
if(isset($_POST['submit']))
{

$rowid=$_POST['id'];
$marks=$_POST['marks']; 

foreach($_POST['id'] as $count => $id){
$mrks=$marks[$count];
$iid=$rowid[$count];
for($i=0;$i<=$count;$i++) {

$sql="update result_table  set marks=:mrks where id=:iid ";
$query = $dbh->prepare($sql);
$query->bindParam(':mrks',$mrks,PDO::PARAM_STR);
$query->bindParam(':iid',$iid,PDO::PARAM_STR);
$query->execute();

$msg="Result info updated successfully";
}
}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Edit Result </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="./plugins/modernizr/modernizr.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "./includes/topbar.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="./dashboard.php" class="brand-link" style="text-align: center">
            <span class="" style="opacity: .8">
                <img src="./img/school_logo.jpg" alt="LOGO" style="border-radius: 50%; display: block;width: 75px; margin: 10px auto; 0px; max-width: 100%">
                <!-- SRMS -->
            </span>
            <span class="brand-text font-weight-light"> Najah School</span></br>
            <span class="brand-text fst-italic fs-3 text-info text-uppercase"> <?php echo $_SESSION['UserName']; ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Home Page -->
                <li class="nav-item has-treeview">
                    <a href="dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>

                <!-- Classes -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-landmark"></i>
                    <p>
                        Classes
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./create-class.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create Class</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-classes.php" class="nav-link">
                        <i class="fas fa-tasks nav-icon"></i>
                        <p>Manage Classes</p>
                        </a>
                    </li>
                    </ul>
                </li>

                <!-- Subjects -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>
                        Subjects
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./create-subject.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create Subject</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-subjects.php" class="nav-link">
                        <i class="fas fa-tasks nav-icon"></i>
                        <p>Manage Subjects</p>
                        </a>
                    </li>
                    </ul>
                </li>
                
                <!-- Subject by Class -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Subjects by Class
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./add-subjectcombination.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Add Subject To Class</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-subjectcombination.php" class="nav-link">
                        <i class="fas fa-tasks nav-icon"></i>
                        <p>Manage Subjects By Class</p>
                        </a>
                    </li>
                    </ul>
                </li>
                
                <!-- Students -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Students
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./add-students.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create Student</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-students.php" class="nav-link">
                        <i class="fas fa-tasks nav-icon"></i>
                        <p>Manage Students</p>
                        </a>
                    </li>
                    </ul>
                </li>

                <!-- Results -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Results
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./add-result.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Create Result</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./manage-results.php" class="nav-link">
                        <i class="fas fa-tasks nav-icon"></i>
                        <p>Manage Results</p>
                        </a>
                    </li>
                    </ul>
                </li>

                <!-- Change Password -->
                <li class="nav-item has-treeview">
                    <a href="./change-password.php" class="nav-link">
                    <i class="nav-icon fas fa-lock"></i>
                    <p>
                        Change Password
                    </p>
                    </a>
                </li>

                <!-- Teachers -->
                <li class="nav-item has-treeview">
                    <a href="./teachers.php" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Manage Teachers
                    </p>
                    </a>
                </li>

                <!-- About the Project -->
                <li class="nav-item has-treeview">
                    <a href="./about.php" class="nav-link">
                    <i class="nav-icon fas fa-info-circle" aria-hidden="true"></i>
                    <p>
                        About the Project
                    </p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item has-treeview">
                    <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt" aria-hidden="true"></i>
                    <p>
                        Logout
                    </p>
                    </a>
                </li>
                
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside> 

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1> Edit Result </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Classes</a></li>
                                <li class="breadcrumb-item active">Create Class</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary">

                                <!-- /.card-header -->
                                <?php if($msg){?>
                                <div class="alert alert-success left-icon-alert" role="alert">
                                    <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                </div><?php } else if($error){?>
                                <div class="alert alert-danger left-icon-alert" role="alert">
                                    <strong> Error! </strong> <?php echo htmlentities($error); ?>
                                </div>
                                <?php } ?>
                                <!-- form start -->
                                <form role="form" id="quickForm" method="post">
                                    <?php 

                                    $ret = "SELECT students_table.StudentName,class_table.ClassName,class_table.Section from result_table join students_table on result_table.StudentId=result_table.StudentId join subject_table on subject_table.id=result_table.SubjectId join class_table on class_table.id=students_table.ClassId where students_table.StudentId=:stid limit 1";
                                    $stmt = $dbh->prepare($ret);
                                    $stmt->bindParam(':stid',$stid,PDO::PARAM_STR);
                                    $stmt->execute();
                                    $result=$stmt->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($stmt->rowCount() > 0)
                                    {
                                    foreach($result as $row)
                                    {  ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Class</label>
                                                    <div class="col-sm-10">
                                                        <?php echo htmlentities($row->ClassName)?>(<?php echo htmlentities($row->Section)?>)
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputname">Student Name</label>
                                                        <div class="col-sm-10">
                                                            <?php echo htmlentities($row->StudentName);?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } }?>

                                                <?php 
                                                $sql = "SELECT distinct students_table.StudentName,students_table.StudentId,class_table.ClassName,class_table.Section,subject_table.SubjectName,result_table.marks,result_table.id as resultid from result_table join students_table on students_table.StudentId=result_table.StudentId join subject_table on subject_table.id=result_table.SubjectId join class_table on class_table.id=students_table.ClassId where students_table.StudentId=:stid ";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':stid',$stid,PDO::PARAM_STR);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $result)
                                                {  ?>
                                            
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputname"><?php echo htmlentities($result->SubjectName)?></label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" name="id[]"
                                                            value="<?php echo htmlentities($result->resultid)?>">
                                                        <input type="text" name="marks[]" class="form-control"
                                                            id="marks" value="<?php echo htmlentities($result->marks)?>"
                                                            maxlength="5" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <?php }} ?> 
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; SRMS.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="./plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="./plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js"></script>
    <script type="text/javascript">
    </script>
</body>

</html>
<?php } ?>