<?php
include("admin_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $home = "active"; ?>
    <?php include("../inc/menu/admin.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <br><br>
                <h1>Welcome <?php echo $name."<small>(".$role.")</small>"; ?>,</h1>
                <p class="lead">Dashboard</p>
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <div class="panel-title">Statistics</div>
                          </div>
                          <div class="panel-body table-responsive">
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <td>Total Number of Students</td>
                                  <td>130</td>
                                </tr>
                                <tr>
                                  <td>Total Number of Rooms</td>
                                  <td>0</td>
                                </tr>
                                <tr>
                                  <td>Total Number of Rooms</td>
                                  <td>0</td>
                                </tr>
                              </tbody>
                            </table>
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

    <?php include("../inc/site/footer.php"); ?>
