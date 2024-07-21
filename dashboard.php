<?php
$PageHeader= "dashboard";
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin']) == false)
    {
    header("Location: index.php");
    }
    else{
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Admin Dashboard </title>

    <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "./includes/topbar.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "./includes/leftbar.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php if($_SESSION['role']== "admin"){?>
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="manage-students.php">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                                    <?php
                                      $sql1 ="SELECT StudentId from students_table ";
                                      $query1 = $dbh -> prepare($sql1);
                                      $query1->execute();
                                      $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                      $totalstudents=$query1->rowCount();
                                    ?>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Students</span>
                                        <span class="info-box-number">
                                            <?php echo htmlentities($totalstudents);?>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </a>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="manage-subjects.php">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i
                                            class="fas fa-book-open"></i></span>
                                    <?php
                                          $sql ="SELECT id from  subject_table ";
                                          $query = $dbh -> prepare($sql);
                                          $query->execute();
                                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                                          $totalsubjects=$query->rowCount();
                                        ?>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Subjects Listed</span>
                                        <span class="info-box-number"><?php echo htmlentities($totalsubjects);?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </a>
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="manage-classes.php">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i
                                            class="fas fa-landmark"></i></span>
                                    <?php
                                          $sql2 ="SELECT id from  class_table ";
                                          $query2 = $dbh -> prepare($sql2);
                                          $query2->execute();
                                          $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                          $totalclasses=$query2->rowCount();
                                        ?>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total classes listed</span>
                                        <span class="info-box-number"><?php echo htmlentities($totalclasses);?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </a>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <a href="manage-results.php">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i
                                            class="fas fa-file"></i></span>
                                    <?php
                                      $sql3="SELECT  distinct StudentId from  result_table ";
                                      $query3 = $dbh -> prepare($sql3);
                                      $query3->execute();
                                      $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                      $totalresults=$query3->rowCount();
                                    ?>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Results Declared</span>
                                        <span class="info-box-number"><?php echo htmlentities($totalresults);?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </a>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-12">
                            <!-- MAP & BOX PANE -->
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Latest Students</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Class</th>
                                                    <th>Registration Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php $sql = "SELECT students_table.StudentName,students_table.RollId,students_table.RegDate,students_table.StudentId,students_table.Status,class_table.ClassName,class_table.Section from students_table join class_table on class_table.id=students_table.ClassId ORDER BY StudentId DESC LIMIT 5";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo htmlentities($result->RollId);?></td>
                                                    <td><?php echo htmlentities($result->StudentName);?></td>
                                                    <td><?php echo htmlentities($result->ClassName);?></td>
                                                    <td><?php echo htmlentities($result->RegDate);?></td>

                                                </tr>
                                                <?php $cnt=$cnt+1;}} ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">

                                    <a href="./manage-students.php" class="btn btn-sm btn-info float-right">
                                        View All Students
                                    </a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>


                        <!-- /.col -->

                    </div>
                    <!-- /.row -->





                </div>
                <!--/. container-fluid -->
            </section> <?php } ?>
            <!-- /.content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Draggable Events</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- the events -->
                                        <div id="external-events">
                                            <div class="external-event bg-success">Lunch</div>
                                            <div class="external-event bg-warning">Go home</div>
                                            <div class="external-event bg-info">Do homework</div>
                                            <div class="external-event bg-primary">Work on UI design</div>
                                            <div class="external-event bg-danger">Sleep tight</div>
                                            <div class="checkbox">
                                                <label for="drop-remove">
                                                    <input type="checkbox" id="drop-remove">
                                                    remove after drop
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Event</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                            <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                            <ul class="fc-color-picker" id="color-chooser">
                                                <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-success" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                                <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
                                        <div class="input-group">
                                            <input id="new-event" type="text" class="form-control"
                                                placeholder="Event Title">

                                            <div class="input-group-append">
                                                <button id="add-new-event" type="button"
                                                    class="btn btn-primary">Add</button>
                                            </div>
                                            <!-- /btn-group -->
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; SRMS.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
   <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.min.js"></script>
<script src="plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="plugins/fullcalendar-interaction/main.min.js"></script>
<script src="plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }    
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>

</html>
<?php } ?>