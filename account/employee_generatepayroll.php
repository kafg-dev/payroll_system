<!doctype html>
<html lang="en">
   <?php include 'header.php'; ?>
   <?php include 'connect.php';?>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

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
                                    <h3 class="page-title">Generate Payroll</h3>
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
                                    <!-- start of upload csv -->
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Upload CSV file</h4>
                                            <p class="text-muted m-b-30 font-14">Save the attendance file into a CSV file format then upload.</p>

                                            <form action="#" id="upload_csv">
                                                <div class="form-group">
                                                    <input type="file" name="upload_file" class="filestyle" data-buttonname="btn-teal">
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" id="upload_submit" class="btn btn-teal waves-effect waves-light m-r-5">Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end of upload csv -->

                                    <!-- start of generate payroll -->
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                             <form action="#" id="select_date">
                                                <h4 class="mt-0 header-title">Select Payroll Date </h4>
                                                </br>
                                                <div class="form-group mb-10">
                                                    <label>Date Range</label>
                                                    <p class="text-muted m-b-30 font-14">Select the start and end date of the payroll you want to generate.</p>

                                                    <div>
                                                        <div class="input-daterange input-group" id="date-range">
                                                            <input type="text" class="form-control" name="start" placeholder="Start Date" id="start_date" autocomplete="off" required/>
                                                            <input type="text" class="form-control" name="end" placeholder="End Date" id="end_date" autocomplete="off" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" id="date_submit" class="btn btn-teal waves-effect waves-light m-r-5">Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end of generate payroll -->

                                </div> <!-- end col -->



                                <div class="col-lg-6">
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Generate Payroll</h4>
                                            <p class="text-muted m-b-30 font-14">Select the employee you want to generate payroll.</p>


                                            <form action="#" id="generate_payroll">

                                                <div class="form-group">
                                                    <label class="control-label">Select Employee</label>
                                                    <select class="form-control select" id="select_id" required>
                                                        <option value="" disabled selected>Select</option>
                                                        <?php include 'get_employeeid.php';?>
                                                    </select>
                                                </div>
                                                
                                                 <div class="form-group m-b-0">
                                                    <label>Payroll</label>
                                                    <input  type="text" class="form-control" id="work_days" hidden />
                                                    <input  type="text" class="form-control" id="gross_pay1" hidden />
                                                    <input  type="text" class="form-control" id="per_day1" hidden />
                                                    <input  type="text" class="form-control" id="date_id" hidden />
                                                    
                                                    <!-- basic salary -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="Basic Salary"  readonly="readonly"/>
                                                        <input type="text" readonly="readonly" class="form-control" style="background-color:white;text-align:right;" id="basic_salary">
                                                    </div>  
                                                    <!-- absent -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="No. of Absent" readonly="readonly"/>
                                                        <input type="text" readonly="readonly" class="form-control" style="background-color:white;text-align:right;" id="absent">
                                                    </div>  
                                                    <!-- late -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="Late (Hours/Minutes)" readonly="readonly"/>
                                                        <input type="text" readonly="readonly" class="form-control" style="background-color:white;text-align:right;" id="late">
                                                    </div> 
                                                    <!-- additional days worked -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="No. of Additional days worked" readonly="readonly"/>
                                                        <input type="number"  class="form-control" style="background-color:white;text-align:right;" id="add_day">
                                                    </div> 
                                                    <!-- additional pay -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="Additional Pay" readonly="readonly"/>
                                                        <input type="number" class="form-control" style="background-color:white;text-align:right;" id="add_pay"/>
                                                    </div> 
                                                    <!-- deduction -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="Other Deduction" readonly="readonly"/>
                                                        <input type="number" class="form-control" style="background-color:white;text-align:right;" id="deduction"/>
                                                    </div> 
                                                    <!-- gross pay -->
                                                    <div class="input-group">
                                                        <input  type="text" class="form-control" placeholder="" autocomplete="off" value="Gross Pay" readonly="readonly" style="font:blue;"/>
                                                        <input type="text" class="form-control" readonly="readonly" style="background-color:white;font:blue;text-align:right;" id="gross_pay"/>
                                                    </div> 

                                                    </div>  
                                                

                                                <div class="form-group m-b-0">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5">
                                                            Save 
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect">
                                                            Clear
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

        //upload csv file
        $('#upload_csv').on("submit",function (e){
            e.preventDefault();
                $.ajax({
                url:"upload_csv.php",
                type:"POST",
                data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,
                     success:function(data){
                        alert(data);
                        $('#upload_csv').reset();
                     }
                });
            });

         //select date
          $(document).ready(function () {
          $('#select_date').on("submit", function (a) {
            a.preventDefault();
           
            var s_date=$("#start_date").val();
            var e_date=$("#end_date").val();

            $.ajax({
                
                type:"POST",
                url:"date_temporary.php",
                data: {"s_date":s_date, "e_date":e_date},
                success: function (data) {
                   alert("Date has been set.");
                   }

                });
            });
          });

          //get salary
          $(document).ready(function () {
          $("#select_id").on("change", function (e) {

            $.ajax({
                type:"post",
                url:"get_basicsalary.php",
                data: 'q='+ $(this).val(),                 
                success: function(value){
                    var data = value.split(",");
                    $('#basic_salary').val(data[0]);
                    $('#absent').val(data[1]);
                    $('#work_days').val(data[2]);
                    $('#late').val(data[3]);
                    $('#date_id').val(data[4]);
                    var work_days=data[2];
                    var absent=data[1];
                    var basic_salary=data[0];
                    var late=data[3];
                    var per_day=basic_salary/26;
                    var per_hour=per_day/8;
                    $('#per_day1').val(per_day);

                    if (absent=="0" && late=="0")
                    {
                        $('#gross_pay').val(basic_salary);
                        $('#gross_pay1').val(basic_salary);
                       

                    }
                    //absent and late
                    if(absent>0 && late>0)
                    {
                        
                        var gross_pay=basic_salary-((per_day*absent) + (per_hour*late));
                        var g_pay=gross_pay.toFixed(2);
                        $('#gross_pay').val(g_pay);
                        $('#gross_pay1').val(g_pay);
                       
                        
                    }
                    // no absent but late
                    if(absent==0 && late>0)
                    {
                       
                        var gross_pay=basic_salary-(per_hour*0);
                        var g_pay=gross_pay.toFixed(2);
                        $('#gross_pay').val(g_pay);
                        $('#gross_pay1').val(g_pay);
                       
                        
                    }

                    // absent not late
                    if(absent>0 && late==0)
                    {
                        
                        var gross_pay=basic_salary-(per_day*absent);
                        var g_pay=gross_pay.toFixed(2);
                        $('#gross_pay').val(g_pay);
                        $('#gross_pay1').val(g_pay);
                      
                      
                    }
                             }
                        });
                      });
                  });

                //on additional days worked
                  $(document).ready(function () {
                  $('#add_day').on("keyup", function (e) {
                    // alert("hi");
                    var per_day=$("#per_day1").val();
                    var gross_pay=$("#gross_pay1").val();
                    var add_day=$("#add_day").val();
                    var add_pay=$("#add_pay").val();
                    var deduction=$("#deduction").val();
                    var sum_add_day=per_day*add_day;
                    if (add_pay=="" || add_pay=="0")
                    {
                        var cal=((parseFloat(gross_pay)+(sum_add_day))-(deduction)).toFixed(2);
                    }
                    else{
                        var cal=((parseFloat(gross_pay)+(sum_add_day)+parseFloat(add_pay))-(deduction)).toFixed(2);
                    }
                     $('#gross_pay').val(cal);
                   

                    });
                  });

                  //on additional pay
                  $(document).ready(function () {
                  $('#add_pay').on("keyup", function (e) {
                    var per_day=$("#per_day1").val();
                    var gross_pay=$("#gross_pay1").val();
                    var add_day=$("#add_day").val();
                    var add_pay=$("#add_pay").val();
                    
                    var deduction=$("#deduction").val();
                    var sum_add_day=(per_day*add_day);
                    if (add_pay=="" || add_pay=="0")
                    {
                        var cal=((parseFloat(gross_pay)+(sum_add_day))-(deduction)).toFixed(2);
                    }
                    else{
                        var cal=((parseFloat(gross_pay)+(sum_add_day)+parseFloat(add_pay))-(deduction)).toFixed(2);
                    }
                    
                     $('#gross_pay').val(cal);
                    });
                  });

                  //on other deductions
                  $(document).ready(function () {
                  $('#deduction').on("keyup", function (e) {
                    var per_day=$("#per_day1").val();
                    var gross_pay=$("#gross_pay1").val();
                    var add_day=$("#add_day").val();
                    var add_pay=$("#add_pay").val();
                    var deduction=$("#deduction").val();
                    var sum_add_day=per_day*add_day;
                    if (add_pay=="" || add_pay=="0")
                    {
                        var cal=((parseFloat(gross_pay)+(sum_add_day))-(deduction)).toFixed(2);
                    }
                    else{
                        var cal=((parseFloat(gross_pay)+(sum_add_day)+parseFloat(add_pay))-(deduction)).toFixed(2);
                    }
                     $('#gross_pay').val(cal);
                    
                    });
                  });

                   $(document).ready(function () {
                    $("#generate_payroll").on("submit", function (e) {
                        e.preventDefault();
                        var emp_id=$("#select_id").val();
                        var date_id=$("#date_id").val();
                        var basic_salary=$("#basic_salary").val();
                        var absent=$("#absent").val();
                        var late=$("#late").val();
                        var add_day=$("#add_day").val();
                        var add_pay=$("#add_pay").val();
                        var deduction=$("#deduction").val();
                        var gross_pay=$("#gross_pay").val();
                        if (confirm('Are you sure? You cannot change this later.')) {
                            // alert('');
                             $.ajax({
                
                            type:"POST",
                            url:"save_payroll.php",
                            data: {"emp_id":emp_id,"date_id":date_id,"basic_salary":basic_salary,"absent":absent,"late":late,"add_day":add_day,"add_pay":add_pay,"deduction":deduction,"gross_pay":gross_pay},
                            success: function (data) {
                                if (data=="0")
                                {
                                    alert("Cannot proceed. Payroll for the selected employee has been generated.");
                                }
                                else
                                {
                                    alert("Payroll has been saved.");
                                }
                               
                           }

                        });

                        } else {
                            // alert('Why did you press cancel? You should have confirmed');
                        }
                        

                       
                        

                    });

                   });

       
            
        </script>

    </body>
</html>