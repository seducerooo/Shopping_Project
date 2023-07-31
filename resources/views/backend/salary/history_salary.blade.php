@extends('admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">History</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">History</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="tab-content">

                                <div class="" id="settings">
<form action="#" >
    @csrf
    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> History</h5>
    <div class="row">


        <div class="col-md-6">
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee Name :</label>
                <strong style="color:#fff;">{{ $paysalary['employee']['name'] }} </strong>
            </div>
        </div> <!-- end col -->


        <div class="col-md-6">
            <div class="mb-3">
                <label for="salary_month" class="form-label">Employee salary month :</label>
                <strong style="color:#fff;">{{ $paysalary['salary_month'] }} </strong>
            </div>
        </div> <!-- end col -->



        <div class="col-md-6">
            <div class="mb-3">
                <label for="salary_month" class="form-label">Employee Advance Salary :</label>
                <strong style="color:#fff;">{{ $paysalary['advance_salary'] }}</strong>

            </div>
        </div> <!-- end col -->




        <div class="col-md-6">
            <div class="mb-3">
                <label for="paid_amount" class="form-label">Employee Paid amount :</label>
                <strong style="color:#fff;">{{ $paysalary['paid_amount'] }} </strong>
            </div>
        </div> <!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="advance_salary" class="form-label">Employee Salary Due:</label>
                <strong style="color:#fff;">{{ $paysalary['due_salary'] }} </strong>

            </div>
        </div> <!-- end col -->




    </div> <!-- end row -->

    <div class="text-end">
        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
    </div>
</form>
                                </div>
                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
