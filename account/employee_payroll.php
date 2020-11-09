<!doctype html>
<html lang="en">
   <?php include 'header.php'; ?>
   <?php include 'connect.php';?>
    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php'; ?>
         <!-- Left Sidebar End -->


            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">
                            <!-- Search input -->
                            <div class="search-wrap" id="search-wrap">
                                <div class="search-bar">
                                    <input class="search-input" type="search" placeholder="Search" />
                                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                        <i class="mdi mdi-close-circle"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Page title -->
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">Employee Payroll</h3>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">

                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <form action="#">

                                                <div class="form-group col-6">
                                                    <label class="control-label">Table below shows the currently generated payroll and date.</label>
                                                   
                                                </div>

                                            </form>
                                        </br>
                                            

                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    
                                                    <th>Name</th>
                                                    <th>Basic Salary</th>
                                                    <th>Absent</th>
                                                    <th>Late</th>
                                                    <th>Add'l Days</th>
                                                    <th>Add'l Pay</th>
                                                    <th>Deduction</th>
                                                    <th>Gross Pay</th>
                                                </tr>
                                                </thead>


                                                <tbody>

                                                
                                                <?php include 'get_employeesalary.php' ?>

                                                </tbody>
                                              
           
                                                
                                            </table>
                                            

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div><!-- container-fluid -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'footer.php'; ?>  

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <?php include 'js.php'; ?>
      <script>
      // $("#select_date").change(function (){
      //   var select_date=$("#select_date").val();
        
      //   $.ajax({
      //       type:"POST",
      //       url:"get_employeesalary.php",
      //       data: {select_date:select_date},
      //       success: function(data){
      //              $('#datatable').DataTable( {
      //               "processing": true,
      //               "serverSide": true,
      //               "ajax": "get_employeesalary.php?select_date"+select_date; // your php file
      //           });

      //   });
      // });
        // $('document').ready(function()
        // {
        //     $.ajax({
        //     type : 'POST',
        //     url  : 'sample.php',
        //     dataType: 'json',
        //     cache: false,
        //     success :  function(result)
        //         {
        //             //pass data to datatable
        //             console.log(result); // just to see I'm getting the correct data.
        //             $('#test_table').DataTable({
        //                 "searching": false, //this is disabled because I have a custom search.
        //                 "aaData": [result], //here we get the array data from the ajax call.
        //                 "aoColumns": [
        //                   { "sTitle": "ID" },
        //                   { "sTitle": "FIRSTNAMName" },
        //                   { "sTitle": "Email" }
        //                   { "sTitle": "Email" }
        //                   { "sTitle": "Email" }

        //                 ] //this isn't necessary unless you want modify the header
        //                   //names without changing it in your html code. 
        //                   //I find it useful tho' to setup the headers this way.
        //             });
        //         }
        //     });
        // });

      </script>

    </body>
</html>