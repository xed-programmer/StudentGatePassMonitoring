<?php

    include '../app/classes/Page.class.php'; 
    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
    include '../app/resources/views/layouts/admin/header.layout.php';

    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();

    include '../app/classes/Database.class.php';
    include '../app/classes/models/admin/Admin.class.php';
    include '../app/classes/controllers/admin/AdminController.class.php';

    // Instantiate Admin Controller
    $admin = new AdminController();
    
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $admin->getCount("users") ?></h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $admin->getCount("students") ?></h3>

                <p>Students</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>
            <a href="{{ route('admin.student.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>0</h3>

                <p>Guardians</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <a href="{{ route('admin.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>0</h3>

                <p>Posts</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="{{ route('admin.professor.index') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<?php
    include '../app/resources/views/layouts/admin/footer.layout.php';
?>