<?php

    include '../../app/classes/Page.class.php'; 
    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();
    include '../../app/resources/views/layouts/admin/header.layout.php';

    // Save the current URI in Session
    $_SESSION['prev_uri'] = Page::getCurrentURI();

    include '../../app/classes/Database.class.php';
    include '../../app/classes/models/Student.class.php';
    include '../../app/classes/controllers/admin/AdminStudentController.class.php';

    // Instantiate Admin Controller
    $adminStudent = new AdminStudentController();
    
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Students</h1>
                </di v>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>

<div class="row">
    <div class="card w-100">
        <div class="card-header">
            <h3 class="card-title" id="table-title">Student List</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $students = $adminStudent->populateStudents();                                    
                                    foreach($students as $student){                                        
                                        echo '<tr>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $student['name'] .'
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                        '. $student['student_code'] .'
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $student['course'] .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $student['year'] .'</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            '. $student['section'] .'</td>                                       
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
    include '../../app/resources/views/layouts/admin/footer.layout.php';
?>