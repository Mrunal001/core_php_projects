<?php

session_start();
include 'config.php';
include 'header.php';
include 'sidebar.php';
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reports</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">reports</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datewise Report Generate</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>From Date:</label>
                    <div class="input-group date" id="fromdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#fromdate" required/>
                        <div class="input-group-append" data-target="#fromdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label>To Date:</label>
                    <div class="input-group date" id="todate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#todate" required/>
                        <div class="input-group-append" data-target="#todate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" id="generate" class="btn btn-block btn-primary">Generate</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="content" id="content-show">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card-body">
              <table id="datewisereport" class="table table-bordered table-striped">
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section> -->
    
  </div>


  

<?php
include 'footer.php';
?>

<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $('#fromdate').datetimepicker({
        format: 'L'
    });

    $('#todate').datetimepicker({
        format: 'L'
    });   
</script>

<script>
  $("#generate").on("click",function(){
    $.ajax({
        url : "datewisereport.php",
        type : "POST",
        success : function(data){
          $("#datewisereport").html(data);
        }
      });
  });
</script>

<script>
  $(function () {
    $("#datewisereport").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>