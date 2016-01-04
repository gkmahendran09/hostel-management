<?php
include("admin_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $manage_students = "active"; ?>
    <?php include("../inc/menu/admin.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <br><br>
                <h1>Welcome <?php echo $name."<small>(".$role.")</small>"; ?>,</h1>
                <p class="lead">Manage Students</p>
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
                      <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <div class="panel-title">Students List</div>
                          </div>
                          <div class="panel-body table-responsive" id="list">
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
      $.get("api/manage_students/select.php",{},function(data,success) {
        $("#list").html(data);
      });
    });
    </script>
