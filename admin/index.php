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
                  <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <div class="panel-title">Statistics</div>
                          </div>
                          <div class="panel-body table-responsive" id="list">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <div class="panel-title">Downloads</div>
                          </div>
                          <div class="panel-body">
                            <div class="well">
                              <a href="api/dashboard/download.php" class="btn btn-danger">Download Student Details</a>
                            </div>
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
    <script>
    $(document).ready(function() {
      $.get("api/dashboard/select_raw.php",{},function(data,success) {
        var data = JSON.parse(data);
        var strBuild = '<table class="table table-bordered"><tbody>';
        strBuild += '<tr><td>Total Number of Rooms</td><td>' + data[0] + '</td></tr>';
        strBuild += '<tr><td>Total Number of Students</td><td>' + data[1] + '</td></tr>';
        strBuild += '<tr><td>Total Pending Fee</td><td>Rs. ' + data[2] + ' /-</td></tr>';
        strBuild += '</tbody></table>';
        console.log(data[2]);

        $("#list").html(strBuild);
      });

    });
    </script>
