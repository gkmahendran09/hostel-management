<?php
include("admin_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $allocate_rooms = "active"; ?>
    <?php include("../inc/menu/admin.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <br><br>
                <h1>Welcome <?php echo $name."<small>(".$role.")</small>"; ?>,</h1>
                <p class="lead">Allocate Rooms</p>
                <?php
                  if(isset($_GET['default_error_msg'])) {
                    echo '<div class="alert alert-info alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                    echo test_input($_GET['default_error_msg']);
                    echo '</div>';
                  }
                ?>
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <div class="panel-title">Allocate Rooms</div>
                          </div>
                          <div class="panel-body table-responsive">
                            <div class="form-group">
                              <select class="form-control" required="true" name="student" placeholder="Name" id="student-list-status">
                              </select>
                            </div>
                            <div id="list">
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
      var roomList;
      $.get("api/allocate_room/select_raw.php",{},function(data,success) {
        var data = JSON.parse(data);
        $("#student-list-status").html(data[0]);
        roomList = data[1];
      });

      $("body").on("change", "#student-list-status", function() {
        var value = $(this).val();
        var param = $('#student-list-status option[value='+value+']').attr("rel").split('-');
        if(value != "") {
          $.get("api/allocate_room/select.php",{'id':value},function(data,success) {
            if(data>0) {
              amount = '<p class="text-danger">Rs. ' + data + ' /-</p>';
            } else {
              amount = '<p class="text-success">Rs. 0 /-</p>';
            }
            var strBuild = '<form method="post" action="api/allocate_room/add.php">'
            strBuild += '<table class="table table-bordered"><thead><tr><th class="text-center">Reg. No</th><th class="text-center">Name</th><th class="text-center">Allocate</th><th class="text-center">Update</th></tr></thead>';
            strBuild += '<tbody><tr><td>' + param[0] + '</td><td>' + param[1] + '</td><td>' + roomList + '</td><td><input type="hidden" name="student_id" value="'+ value +'"><input type="submit" class="btn btn-primary" value="Update"></td></tr></tbody></table>';
            strBuild += '</form>';
            $("#list").html(strBuild);
          });
        }
      });

    });
    </script>
