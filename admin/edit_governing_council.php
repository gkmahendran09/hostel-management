<?php
include("admin_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $edit_governing_council = "active"; ?>
    <?php include("../inc/menu/admin.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <br><br>
                <h1>Welcome <?php echo $name."<small>(".$role.")</small>"; ?>,</h1>
                <p class="lead">Edit Governing Council</p>
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
                            <div class="panel-title">Members List</div>
                          </div>
                          <div class="panel-body table-responsive" id="list">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-warning">
                          <div class="panel-heading">
                            <div class="panel-title">Add a Member</div>
                          </div>
                          <div class="panel-body table-responsive">
                            <form method="post" action="api/governing_council/add.php" role="form">
                              <div class="form-group">
                                <input type="text" class="form-control" required="true" name="name" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control" required="true" name="designation" placeholder="Designation">
                              </div>
                              <div class="form-group">
                                <input type="submit" class="form-control btn btn-success" required="true" value="Add Member">
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
      $.get("api/governing_council/select.php",{},function(data,success) {
        $("#list").html(data);
      });
    });
    </script>
