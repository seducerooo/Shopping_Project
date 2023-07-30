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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Advance Salary</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Edit Advance Salary</h4>
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
<form action="{{ route('advance.salary.update',$salary->id) }}" method="post">
    @csrf
    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Employee Info</h5>
    <div class="row">



        <div class="col-md-6">
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee Name :</label>
                <select name="employee_id" id="employee_id" class="form-select @error('employee_id') is-invalid @enderror">
                    <option selected="" disabled>Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ ($employee->id == $salary['employee']['id']) ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                <span class="text-danger"> {{ $message }} </span>
                @enderror

            </div>
        </div> <!-- end col -->



        <div class="col-md-6">
            <div class="mb-3">
                <label for="month" class="form-label">Salary Month :</label>
                <select name="month" id="month" class="form-select @error('month') is-invalid @enderror">
                    <option selected="" disabled>Select month</option>
                    <option value="January" {{ ($salary->month == 'January') ? 'selected' : '' }}>January</option>
                    <option value="February" {{ ($salary->month == 'February') ? 'selected' : '' }}>February</option>
                    <option value="March"{{ ($salary->month == 'March') ? 'selected' : '' }}>March</option>
                    <option value="April" {{ ($salary->month == 'April') ? 'selected' : '' }}>April</option>
                    <option value="May" {{ ($salary->month == 'May') ? 'selected' : '' }}>May</option>
                    <option value="June" {{ ($salary->month == 'June') ? 'selected' : '' }}>June</option>
                    <option value="July" {{ ($salary->month == 'July') ? 'selected' : '' }}>July</option>
                    <option value="August" {{ ($salary->month == 'August') ? 'selected' : '' }}>August</option>
                    <option value="September" {{ ($salary->month == 'September') ? 'selected' : '' }}>September</option>
                    <option value="October" {{ ($salary->month == 'October') ? 'selected' : '' }}>October</option>
                    <option value="November" {{ ($salary->month == 'November') ? 'selected' : '' }}>November</option>
                    <option value="December" {{ ($salary->month == 'December') ? 'selected' : '' }}>December</option>
                </select>
                @error('month')
                <span class="text-danger"> {{ $message }} </span>
                @enderror

            </div>
        </div> <!-- end col -->




        <div class="col-md-6">
            <div class="mb-3">
                <label for="year" class="form-label">Salary Year :</label>
                <select name="year" id="year" class="form-select @error('year') is-invalid @enderror">
                    <option selected="" disabled>Select Year</option>
                    <option value="2020"  {{ ($salary->year == '2020') ? 'selected' : '' }}>2020</option>
                    <option value="2021"  {{ ($salary->year == '2021') ? 'selected' : '' }}>2021</option>
                    <option value="2022"  {{ ($salary->year == '2022') ? 'selected' : '' }}>2022</option>
                    <option value="2023"  {{ ($salary->year == '2023') ? 'selected' : '' }}>2023</option>
                    <option value="2024"  {{ ($salary->year == '2024') ? 'selected' : '' }}>2024</option>
                    <option value="2025"  {{ ($salary->year == '2025') ? 'selected' : '' }}>2025</option>
                    <option value="2026"  {{ ($salary->year == '2026') ? 'selected' : '' }}>2026</option>
                    <option value="2027"  {{ ($salary->year == '2027') ? 'selected' : '' }}>2027</option>
                </select>
                @error('year')
                <span class="text-danger"> {{ $message }} </span>
                @enderror

            </div>
        </div> <!-- end col -->


        <div class="col-md-6">
            <div class="mb-3">
                <label for="advance_salary" class="form-label">Employee advance Salary :</label>
                <input type="text"
                       name="advance_salary"
                       class="form-control @error('advance_salary') is-invalid @enderror"
                       id="advance_salary"
                       placeholder="Enter Advance Salary"
                       value="{{$salary->advance_salary}}">

                @error('advance_salary')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
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
