<?php
include("student_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
?>

</head>

<body>

    <!-- Navigation -->
    <?php $home = "active"; ?>
    <?php include("../inc/menu/student.php"); ?>

    <!-- Page Content -->
    <div class="container">
      <?php
      if(isset($_GET['payment_success'])) {
      ?>
        <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
        <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Fees payment done</div>
        </div>
        </div>
      <?php
      }
     ?>

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
                            <div class="panel-title">Room Details</div>
                          </div>
                          <div class="panel-body table-responsive" id="list">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <div class="panel-title">Fees payment</div>
                          </div>
                          <div class="panel-body">
                            <div class="well">
                              <p>Fees to pay: <span class="text-danger" id="fee">Rs. 300 /-</span></p>
                              <a href="payment_success.php" class="btn btn-danger" id="pay_btn">Pay Fees</a>
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
        if(data[1] === null) {
            $("#list").html("Room not allocated");
        } else {
          var strBuild = '<b>Room Number:</b> ' + data[1] + '<br><br>';          
          $("#list").html(strBuild);
        }
        if(data[0] === null) {
          $("#fee").html('Rs. 0 /-');
          $("#pay_btn").remove();
        } else {
          $("#fee").html('Rs. ' + data[0] + ' /-');
        }
      });

    });
    </script>
