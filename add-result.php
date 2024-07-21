<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])== false)    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['add_result']))
{
    $marks=array();
$class=$_POST['class'];
$studentid=$_POST['studentid']; 
$mark=$_POST['marks'];

 $stmt = $dbh->prepare("SELECT subject_table.SubjectName,subject_table.id FROM subject_by_class_table join  subject_table on  subject_table.id=subject_by_class_table.SubjectId WHERE subject_by_class_table.ClassId=:cid order by subject_table.SubjectName");
 $stmt->execute(array(':cid' => $class));
  $sid1=array();
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {

array_push($sid1,$row['id']);
   } 
  
for($i=0;$i<count($mark);$i++){
    $mar=$mark[$i];
  $sid=$sid1[$i];
$sql="INSERT INTO  result_table(StudentId,ClassId,SubjectId,marks) VALUES(:studentid,:class,:sid,:marks)";
$query = $dbh->prepare($sql);
$query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
$query->bindParam(':class',$class,PDO::PARAM_STR);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':marks',$mar,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Result info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Add Result </title>
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
    <script>
    function getStudent(val) {
        $.ajax({
            type: "POST",
            url: "get_student.php",
            data: 'classid=' + val,
            success: function(data) {
                $("#studentid").html(data);

            }
        });
        $.ajax({
            type: "POST",
            url: "get_student.php",
            data: 'classid1=' + val,
            success: function(data) {
                $("#subject").html(data);

            }
        });
    }
    </script>
    <script>
    function getresult(val, clid) {

        var clid = $(".clid").val();
        var val = $(".stid").val();;
        var abh = clid + '$' + val;
        //alert(abh);
        $.ajax({
            type: "POST",
            url: "get_student.php",
            data: 'studclass=' + abh,
            success: function(data) {
                $("#reslt").html(data);

            }
        });
    }
    </script>
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
                <?php if($_SESSION['role']== "admin"){?>
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
                    <?php } ?>
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
                <?php if($_SESSION['role']== "admin"){?>
                <li class="nav-item has-treeview">
                    <a href="./teachers.php" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Manage Teachers
                    </p>
                    </a>
                </li>
                    <?php } ?>
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
                            <h1>Add Result</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Result</a></li>
                                <li class="breadcrumb-item active">Add Result</li>
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
                                <form role="form" id="quickForm" method="POST">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Class</label>
                                                    <select name="class" class="form-control select2 clid"
                                                        onChange="getStudent(this.value);" id="classid"
                                                        style="width: 100%;" required>
                                                        <option selected="selected" value="">Select Class</option>
                                                        <?php $sql = "SELECT * from class_table";
                                                          $query = $dbh->prepare($sql);
                                                          $query->execute();
                                                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                          if($query->rowCount() > 0)
                                                          {
                                                          foreach($results as $result)
                                                          {   ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>">
                                                            <?php echo htmlentities($result->ClassName); ?>&nbsp;
                                                            Section-<?php echo htmlentities($result->Section); ?>
                                                        </option>
                                                        <?php }} ?>
                                                    </select>
                                                    <div class="form-group">
                                                        <label for="exampleInputname">Student Name</label>
                                                        <select name="studentid" class="form-control select2 stid"
                                                            onChange="getresult(this.value);" id="studentid"
                                                            style="width: 100%;" required>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">

                                                    <div class="col-sm-10">
                                                        <div id="reslt">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputname">Subjects</label>
                                                    <div id="subject">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" name="add_result" class="btn btn-primary">+Add</button>
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
<?PHP } ?>