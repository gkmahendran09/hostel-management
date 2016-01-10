<?php
include("student_check.php");

include("../inc/utils.php");
include("../inc/site/header.php");
include("../inc/db_connection.php");
if($conn->query("DELETE FROM student_fee WHERE student_id=".$_SESSION['student_id'])) {
  header("refresh:1;url=/student?payment_success=done");
} else {
  echo "Error Occured in payment!";
}


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
              <h1>Processing your payment....</h1>
              <h4>Do not refresh your page. You'll be redirected once payment done successfully.</h4>
              <br><br>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("../inc/site/footer.php"); ?>
