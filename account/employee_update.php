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
                                    <h3 class="page-title">Add/Update Employee</h3>
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
                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Add Employee</h4>
                                            <p class="text-muted m-b-30 font-14">Fill in the form below with the right information.</p>

                                            <form class="" action="#" id="add_form">
                                                <div class="form-group">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control" required placeholder="" id="add_id" autocomplete="off"/>
                                                    <label id="error" style="color:red;"></label>
                                                </div>

                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <div>
                                                        <input type="text" class="form-control" required placeholder="Lastname" id="add_lastname" autocomplete="off"/>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="text" class="form-control" required placeholder="Firstname" id="add_firstname" autocomplete="off"/>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="text" class="form-control" required placeholder="Middlename" id="add_middlename" autocomplete="off"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <div>
                                                        <input data-parsley-type="number" type="text"class="form-control" required placeholder="Enter only amount" id="add_salary" autocomplete="off"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" id="add_submit" class="btn btn-teal waves-effect waves-light m-r-5">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Update Employee</h4>
                                            <p class="text-muted m-b-30 font-14">Select employee you want to modify then fill the form with updated information.</p>

                                            <form action="#" id="update_form">

                                                <div class="form-group">
                                                    <label class="control-label">Employee ID</label>
                                                    <select class="form-control select" id="select_id" required>
                                                        <option value="">Select</option>
                                                        <?php include 'get_employeeid.php';?>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <div>
                                                        <input type="text" class="form-control" required placeholder="Lastname"id="update_lastname" autocomplete="off"/>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="text" class="form-control" required placeholder="Firstname"id="update_firstname" autocomplete="off"/>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <input type="text" class="form-control" required placeholder="Middlename"id="update_middlename" autocomplete="off"/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <input data-parsley-type="number" type="text" class="form-control" required placeholder="" id="update_salary" autocomplete="off"/>
                                                
                                                </div>

                                                <div class="form-group m-b-0">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <?php include 'footer.php'; ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <?php include 'js.php'; ?>
        <script>

            //add employee, check ID duplication
            $('#add_id').on("input", function (e) {
            $.ajax({
                type:'post',
                url:'check_employeeid.php',
                data: 'q='+ $(this).val(),                 
                success: function(value){
                    if (value=="yes")
                    {
                        $('#error').show();
                        $('#error').text('ID number already taken!');
                        $('#add_submit').prop('disabled', true);
                    }
                    else
                    {
                        $('#error').hide();
                        $('#add_submit').prop('disabled', false);
                    }
                    
                 }
              }); 
            });

            // add employee
            $(document).ready(function () {
                $('#error').hide();
                $('#add_form').on("submit", function (e) {
                  e.preventDefault();
                  var id = $('#add_id').val();
                  var lastname = $('#add_lastname').val();
                  var firstname = $('#add_firstname').val();
                  var middlename = $('#add_middlename').val();
                  var salary = $('#add_salary').val();
                  $.ajax
                    ({
                      type: "POST",
                      url: "add_employee.php",
                      data: {"id": id, "lastname": lastname, "firstname": firstname, "middlename": middlename, "salary": salary},
                      success: function (data) {
                      alert("Data SAVED");
                      $('#add_form')[0].reset();
                      }
                    });
                });
              });

            //update employee,get details
            $('#select_id').change(function(){
            $.ajax({
                type:'post',
                url:'get_employeedetails.php',
                data: 'q='+ $(this).val(),                 
                success: function(value){
                    var data = value.split(",");
                    $('#update_lastname').val(data[0]);
                    $('#update_firstname').val(data[1]);
                    $('#update_middlename').val(data[2]);  
                    $('#update_salary').val(data[3]);  
                 }
              }); 
            });

            //update employee
            $(document).ready(function () {
                $('#update_form').on("submit", function (e) {
                  e.preventDefault();
                  var c_id= $('#select_id').val();
                  var lastname = $('#update_lastname').val();
                  var firstname = $('#update_firstname').val();
                  var middlename = $('#update_middlename').val();
                  var salary = $('#update_salary').val();
                  $.ajax
                    ({
                      type: "POST",
                      url: "update_employee.php",
                      data: {"c_id":c_id, "lastname": lastname, "firstname": firstname, "middlename": middlename, "salary": salary},
                      success: function (data) {
                        if (data=="yes")
                        {
                          alert("Data Updated");
                          $('#update_form')[0].reset();
                        }
                        else
                        {
                          alert("Data Not Updated");
                        }
                      
                      }
                    });
                });
              });


           
        </script>

    </body>
</html>