@extends('admin_dashboard')
@section('admin')


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">last Month Salary</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>Employee name</th>
        <th>Month</th>
        <th>salary</th>
        <th>status</th>
        <th>Action</th>
    </tr>
    </thead>


    <tbody>
    @foreach($paidSalaries as $paysalary)
        <tr>
            <td>{{ $paysalary->id }}</td>
            <<td><img src="{{ asset($paysalary['employee']['image']) }}" width="30px" height="30px" ></td>
            <td>{{ $paysalary['employee']['name'] }}</td>
            <td>{{ $paysalary['salary_month'] }}</td>
            <td>{{ $paysalary['employee']['salary'] }}</td>
            <td><span class="badge bg-info">Full paid</span></td>

            <th>
                <a href="{{ route('history.salary',$paysalary->id) }}" class="btn btn-primary">History</a>
            </th>
        </tr>
    @endforeach

    </tbody>
</table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->

@endsection
