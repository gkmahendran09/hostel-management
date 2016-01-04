<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/">Hostel Management <small>(Admin Dashboard)</small></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?php echo $home; ?>">
                    <a href="/admin/"><span class="glyphicon glyphicon-home"></span> Home</a>
                </li>
                <li class="<?php echo $add_rooms; ?>">
                    <a href="/admin/add_rooms.php"><span class="glyphicon glyphicon-plus"></span> Add Rooms</a>
                </li>
                <li class="<?php echo $allocate_rooms; ?>">
                    <a href="/admin/allocate_rooms.php"><span class="glyphicon glyphicon-ok"></span> Allocate Rooms</a>
                </li>
                <li class="<?php echo $update_fee_details; ?>">
                    <a href="/admin/update_fee_details.php"><span class="glyphicon glyphicon-pencil"></span> Update Fee Details</a>
                </li>
                <li class="<?php echo $edit_governing_council; ?>">
                    <a href="/admin/edit_governing_council.php"><span class="glyphicon glyphicon-edit"></span> Edit Governing Council</a>
                </li>
                <li class="<?php echo $manage_students; ?>">
                    <a href="/admin/manage_students.php"><span class="glyphicon glyphicon-user"></span> Manage Students</a>
                </li>                
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/Auth/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
