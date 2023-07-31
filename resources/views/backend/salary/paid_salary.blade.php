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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Paid Salary</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Paid Salary</h4>
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
<form action="{{ route('employee.salary.store',$paysalary->id) }}" method="post">
@csrf
<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Paid Salary</h5>
<div class="row">



    <div class="col-md-6">
        <div class="mb-3">
            <label for="employee_id" class="form-label">Employee Name :</label>
            <strong style="color:#fff;">{{ $paysalary->name }} </strong>
        </div>
    </div> <!-- end col -->



    <div class="col-md-6">
        <div class="mb-3">
            <label for="salary_month" class="form-label">Salary Month :</label>
            <strong style="color:#fff;">{{ date("F",strtotime('-1')) }} </strong>
            <input type="hidden" name="salary_month" value="{{ date("F",strtotime('-1')) }}">
        </div>
    </div> <!-- end col -->




    <div class="col-md-6">
        <div class="mb-3">
            <label for="paid_amount" class="form-label">Employee Salary :</label>
            <strong style="color:#fff;">{{ $paysalary->salary }} </strong>
            <input type="hidden" name="paid_amount" value="{{ $paysalary->salary }}">
        </div>
    </div> <!-- end col -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="advance_salary" class="form-label">Employee Advance Salary :</label>
            <strong style="color:#fff;">{{ $paysalary['salary'] }} </strong>
            <input type="hidden" name="paid_amount" value="{{ $paysalary['salary'] }}">

        </div>
    </div> <!-- end col -->

    <div class="col-md-6">
        <div class="mb-3">
            <label for="advance_salary" class="form-label">Employee Advance Salary :</label>
            <strong style="color:#fff;">{{ $paysalary['advance']['advance_salary'] }} </strong>
            <input type="hidden" name="advance_salary" value="{{ $paysalary['advance']['advance_salary'] }}">

        </div>
    </div> <!-- end col -->



    <div class="col-md-6">
        <div class="mb-3">
            <label for="due_salary" class="form-label">Due Salary :</label>
            <strong style="color:#fff;">
                @php
                    $amount = $paysalary->salary -  $paysalary['advance']['advance_salary'];
                @endphp
                @if( isset($paysalary['advance']['advance_salary']) == NULL)
                    <strong style="color:#fff;"> No Salary</strong>
                @else
                    <strong style="color:#fff;">{{ round($amount) }}</strong>
                @endif
                {{ $amount }}
                <input type="hidden" name="due_salary" value="{{ $amount }}">
            </strong>
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
