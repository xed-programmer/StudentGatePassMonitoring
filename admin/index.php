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
                </di v>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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

<div class="row">
    <div class="card w-100">
        <div class="card-header">
            <h3 class="card-title" id="table-title">Student Gate Pass</h3>
        </div>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed"
                            role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Student Code: activate to sort column ascending">Student
                                        Code</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Course: activate to sort column ascending">Course</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Year Level: activate to sort column ascending">Year
                                        Level</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Section: activate to sort column ascending">Section</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Day: activate to sort column ascending">Day</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Time: activate to sort column ascending">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $attendances = $admin->getStudentAttendance();                                    
                                    foreach($attendances as $attendance){                                        
                                        echo '<tr>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $attendance['name'] .'
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                        '. $attendance['student_code'] .'
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $attendance['course'] .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $attendance['year'] .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $attendance['section'] .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                        '. $attendance['status'] .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. date("D, M. d", strtotime($attendance['created_at'])) .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. date("h:i A", strtotime($attendance['created_at'])) .'</td>
                                    </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables  & Plugins -->
<script src=<?php echo Page::asset('/public/plugins/moment/moment.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables/jquery.dataTables.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/jszip/jszip.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/pdfmake/pdfmake.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/pdfmake/vfs_fonts.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-buttons/js/buttons.html5.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-buttons/js/buttons.print.min.js') ?>></script>
<script src=<?php echo Page::asset('/public/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>></script>

<!-- Page specific script -->
<script>
$(document).ready(function() {
    $("#example1").DataTable({
        "aaSorting": [],
        "paging": true,
        'autoWidth': false,
        "ordering": true,
        "info": true,
        "scrollX": true,
        "scrollY": true,
        "buttons": [
            'copy',
            {
                extend: 'csv',
                title: $("#table-title").text(),
                messageTop: 'As of ' + moment().format('MMMM DD, YYYY')
            },
            {
                extend: 'print',
                title: $("#table-title").text(),
                messageTop: 'As of ' + moment().format('MMMM DD, YYYY')
            },
            {
                extend: 'excel',
                title: $("#table-title").text(),
                messageTop: 'As of ' + moment().format('MMMM DD, YYYY')
            },
            {
                extend: 'pdf',
                title: $("#table-title").text(),
                messageTop: 'As of ' + moment().format('MMMM DD, YYYY')
            },
            {
                extend: 'print',
                title: $("#table-title").text(),
                messageTop: 'As of ' + moment().format('MMMM DD, YYYY')
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>
<?php
    include '../app/resources/views/layouts/admin/footer.layout.php';
?>