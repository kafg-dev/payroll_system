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
                                    <h3 class="page-title">Attendance</h3>
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
                                            <p class="text-muted m-b-30 font-14">Select which employee's attendance you want to view and check.
                                            </p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="p-20">
                                                            <form id="update_form">
                                                            <div class="form-group">
                                                            <label>Name</label>
                                                            <select class="form-control select" id="select_id" required>
                                                                <option value="" disabled selected>Select</option>
                                                                <?php include 'get_employeeid.php';?>
                                                            </select>
                                                            </div> 
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="p-20">
                                                        
                                                            <div class="form-group">
                                                            <label>Month</label>
                                                            <input class="form-control" type="month" value="" id="date_now">
                                                            </div>
    
                                                    </div>
                                                </div> <!-- end col -->
                                            </form>
                                            </div> <!-- end row -->
                                                    <div class="form-group col-8" id="my_table">
                                                    
                                                    </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->
                    <?php include 'footer.php'; ?>  

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <?php include 'js.php'; ?>
        <script>
        //select employee,get details
            $('#select_id').change(function(){
                var id=$("#select_id").val();
                var date=$("#date_now").val();
                $.ajax({
                    type:"POST",
                    url:"get_employeeattendance.php",
                    cache: false,
                    data:{id:id,date_a:date},
                    success: function(data)
                    {

                        if (data=="0")
                        {
                         $("#my_table").html("NO DATA.");
                        }
                        else
                        {
                         $("#my_table").html(data);
                        }
                       
                    }
                });
              });

             $('#date_now').change(function(){
                var id=$("#select_id").val();
                var date=$("#date_now").val();
                $.ajax({
                    type:"POST",
                    url:"get_employeeattendance.php",
                    cache: false,
                    data:{id:id,date_a:date},
                    success: function(data)
                    {
                        
                        if (data=="0")
                        {
                         $("#my_table").html("NO DATA.");
                        }
                        else
                        {
                         $("#my_table").html(data);
                        }
                       
                    }
                });
              });

            
        </script>

    </body>
</html>