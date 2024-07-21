<!-- <link rel="stylesheet" href="../css/font-awesome.css"> -->
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
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Classes -->
          <?php if($_SESSION['role']!= "teacher"){?>
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
          </li><?php } ?>
          <!-- Results -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
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
          </li> <?php } ?>
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
