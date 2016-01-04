<?php
include("admin_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $update_fee_details = "active"; ?>
    <?php include("../inc/menu/admin.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <br><br>
                <h1>Welcome <?php echo $name."<small>(".$role.")</small>"; ?>,</h1>
                <p class="lead">Update Fee Details</p>
                <?php
                  if(isset($_GET['default_error_msg'])) {
                    echo '<div class="alert alert-info alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                    echo test_input($_GET['default_error_msg']);
                    echo '</div>';
                  }
                ?>
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <div class="panel-title">Check Status</div>
                          </div>
                          <div class="panel-body table-responsive">
                            <div class="form-group">
                              <select class="form-control" required="true" name="name" placeholder="Name" id="student-list-status">
                              </select>
                            </div>
                            <div id="list">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-warning">
                          <div class="panel-heading">
                            <div class="panel-title">Update Fee</div>
                          </div>
                          <div class="panel-body table-responsive">
                            <form method="post" action="api/update_fee_details/add.php" role="form">
                              <div class="form-group">
                                <select class="form-control" required="true" name="name" placeholder="Name" id="student-list">
                                </select>
                              </div>
                              <div class="form-group">
                                <input type="number" class="form-control" required="true" name="amount" placeholder="Amount">
                              </div>
                              <div class="form-group">
                                <input type="submit" class="form-control btn btn-success" required="true" value="Update">
                              </div>
                            </form>
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
      $.get("api/update_fee_details/select_raw.php",{},function(data,success) {
        $("#student-list").html(data);
        $("#student-list-status").html(data);
      });

      $("body").on("change", "#student-list-status", function() {
        var value = $(this).val();
        var param = $('#student-list-status option[value='+value+']').attr("rel").split('-');
        if(value != "") {
          $.get("api/update_fee_details/select.php",{'id':value},function(data,success) {
            if(data>0) {
              amount = '<p class="text-danger">Rs. ' + data + ' /-</p>';
            } else {
              amount = '<p class="text-success">Rs. 0 /-</p>';
            }
            var strBuild = '<table class="table table-bordered"><thead><tr><th class="text-center">Name</th><th class="text-center">Reg.No</th><th class="text-center">Balance</th></tr></thead>';
            strBuild += '<tbody><tr><td>' + param[0] + '</td><td>' + param[1] + '</td><td>' + amount + '</td></tr></tbody></table>';
            $("#list").html(strBuild);
          });
        }
      });

    });
    </script>
