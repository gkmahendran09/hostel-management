<?php include("inc/site/header.php"); ?>

</head>

<body>

    <!-- Navigation -->
    <?php $governing_body_details = "active"; ?>
    <?php include("inc/menu/front-end.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h1>Governing Body Details</h1>
                <p class="lead">Members List</p>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Designation</th>
                      </tr>
                    </thead>
                    <tbody id="list">

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include("inc/site/footer.php"); ?>
    <script>
    $(document).ready(function() {
      $.get("admin/api/governing_council/select-frontend.php",{},function(data,success) {
        $("#list").html(data);
      });
    });
    </script>
