<?php
include("inc/utils.php");
include("inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $home = "active"; ?>
    <?php include("inc/menu/front-end.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Welcome to Hostel Management System</h1>
                <p class="lead">Simple Hostel Management</p>
                <?php
                  if(isset($_GET['default_error_msg'])) {
                    echo '<div class="alert alert-info">';
                    echo test_input($_GET['default_error_msg']);
                    echo '</div>';
                  }
                ?>
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="panel panel-warning">
                          <div class="panel-heading">
                            Students
                          </div>
                          <div class="panel-body">
                            <p>
                              New students can register using register button,
                              existing students login to their dashboard.
                            </p>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                              <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
                            </ul>

                            <div class="tab-content">
                              <br>
                              <div role="tabpanel" class="tab-pane fade in active" id="login">
                                <h4>Login</h4>
                                <form method="post" role="form" action="Auth/Authentication.php">
                                  <div class="form-group">
                                    <input type="text" name="uname" placeholder="Username" class="form-control" required="true">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control" required="true">
                                  </div>
                                  <input type="hidden" name="role" value="student">
                                  <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-block btn-success form-control" value="Login">
                                  </div>
                                </form>
                                <?php
                                  if(isset($_GET['student_login_error_msg'])) {
                                    echo '<div class="alert alert-danger">';
                                    echo test_input($_GET['student_login_error_msg']);
                                    echo '</div>';
                                  }
                                ?>
                              </div>
                              <div role="tabpanel" class="tab-pane fade" id="register">
                                <form method="post" role="form" action="Auth/Registration.php">
                                  <h4>Register</h4>
                                  <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" class="form-control" required="true">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" name="regno" placeholder="Reg. No" class="form-control" required="true">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" name="uname" placeholder="Username" class="form-control" required="true">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control" required="true">
                                  </div>
                                  <input type="hidden" name="role" value="student">
                                  <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-block btn-success form-control" value="Register">
                                  </div>
                                </form>
                                <?php
                                  if(isset($_GET['student_register_error_msg'])) {
                                    echo '<div class="alert alert-danger">';
                                    echo test_input($_GET['admin_login_error_msg']);
                                    echo '</div>';
                                  }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            Admin
                          </div>
                          <div class="panel-body">
                            <p>
                              Admin Login to dashboard
                            </p>
                            <form method="post" role="form" action="Auth/Authentication.php">
                              <div class="form-group">
                                <input type="text" name="uname" placeholder="Username" class="form-control" required="true">
                              </div>
                              <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control" required="true">
                              </div>
                              <input type="hidden" name="role" value="admin">
                              <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-block btn-success form-control" value="Login">
                              </div>
                            </form>
                            <?php
                              if(isset($_GET['admin_login_error_msg'])) {
                                echo '<div class="alert alert-danger">';
                                echo test_input($_GET['admin_login_error_msg']);
                                echo '</div>';
                              }
                            ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("inc/site/footer.php"); ?>
