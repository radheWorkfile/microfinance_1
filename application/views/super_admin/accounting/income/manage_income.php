<!-- start page title -->       
        <div class="row">
        <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between card flex-sm-row border-0">
        <h4 class="mb-sm-0 font-size-16 fw-bold"><?php echo $title;?></h4>

        <div class="page-title-right">
        <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
        <li class="breadcrumb-item active">
        <?php echo $breadcrums ?>
        </li>
        </ol>
        </div>
        </div>
        </div>         
        </div>  
        
        
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <table id="all_income_list" class="table table-bordered dt-responsive nowrap w-100">
        <thead>
        <tr>
        <th>Sl. No.</th>
        <th>Source Name</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
        </tr>
        </thead>
        </table>
        </div>
        <!-- end card-body -->
        </div>
        <!-- end card -->
        </div>
        <!-- end col -->
        </div>

<!--  Update Member Data Model -->
        <div class="modal fade update_category" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md"> 
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="myExtraLargeModalLabel">Update Income Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="income_details_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="modal-body">
        <div id="show_all_income"></div>
        </div>

               

        <div class="modal-footer">
        <!-- <div class="col-lg-3"style="position:absolute;top:-8px;left:20px;">
        <p><img src="<?//php echo base_url();?>media/not_ava_img.jpeg" alt=""style="height:3.5rem;background-image:cover;border:4px solid #d2d2d2;"></p>
        </div> -->
        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->     
        </div>      
        <!-- /.modal -->


        <!--  View Member Data Model -->        
        <div class="modal fade view_income" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="myExtraLargeModalLabel">View Income Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div id="all_income_details"></div>
        </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->     
        </div>      
        <!-- /.modal -->




        <!--  View Member Data Model -->
        <div class="modal fade assign_model" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header"style="border-top:5px solid #0576b9 ;border-radius:2px solid #0576b9 ;">
        <h5 class="modal-title" id="myExtraLargeModalLabel"style="color:#a52b2b;"><i class="fa fa-times"></i>&nbsp;&nbsp;Deactivate Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="javaScript:void(0);" id="update_ass_staff" method="post">
        <div class="modal-body">
        <div id="assign-staff"></div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->     
        </div>      
        <!-- /.modal -->



        <script src="<?php echo base_url() ?>media/js/super_admin/accounting/income.js"></script>
        <script src="<?php echo base_url() ?>media/old_file/js/js.js"></script>

        <script>
        $(document).ready(function() {
        let searchObj = {};
        // Reporting Section
        let reportTable = {
        printTable: function(search_data) {
        $("#all_income_list").DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        'columnDefs': [{
        'targets': [1, 2, 3,4],
        'orderable': true
        }],     
        "ajax": {       
        "url": base_url + 'super_admin/accounting/Income/income_data',
        "type": "POST",
        "dataSrc": "data",
        "data": search_data     
        },      
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-     col-md-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "lengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"]
        ],      
        "buttons": ["excel", "pdf", "print"]
        });

        }       
        }       
        reportTable.printTable(searchObj);      
     });     


        function view_income(id) {
            $.ajax({
            url: base_url + 'super_admin/accounting/Income/view_income_data',
            type: "POST",
            data: {
            'id': id
            },
            success: function(data) {
            $('#all_income_details').html(data);
            },
        });     }


    function update_income_details(id) {
    $.ajax({
        url: base_url + 'super_admin/accounting/Income/up_income_det',
        type: "POST",
        data: {
        'id': id
        },
        success: function(data) {
        $('#show_all_income').html(data);
        },
    });
    }

    $('#income_details_updata').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: base_url + 'super_admin/accounting/Income/income_details_updata',
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        dataType: 'json',
        success: function(data) {
            if (data.icon == "error") {
            var valid = '';
            $.each(data.text, function(i, item) {
            valid += item;
            });
            Swal.fire({
            position: "top-end",
            icon: data.icon,
            html: valid,
            showConfirmButton: !1,
            timer: 1500
            });
            } else {
            Swal.fire({
            position: "top-end",
            icon: data.icon,
            title: data.text,
            showConfirmButton: !1,
            timer: 1500
            });
            setTimeout(function() {
            window.location.reload(1);
            }, 1500);
            }
        }
    });
   });
</script>


