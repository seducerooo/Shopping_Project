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
                        <h4 class="page-title">All Pay Salary</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                              <h4 class="header-title">    {{ date("F Y") }}</h4>

<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>Employee name</th>
        <th>Month</th>
        <th>Salary</th>
        <th>Advance Salary</th>
        <th>Action</th>
    </tr>
    </thead>


    <tbody>
    @foreach($employees as  $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td><img src="{{ asset($employee['image']) }}" width="30px" height="30px" ></td>
            <td>{{ $employee['name'] }}</td>
            <td> <span class="badge bg-info">{{ date("F",strtotime('-1 month')) }} </span></td>
            <td>{{ $employee['salary'] }}</td>

            @if( $employee['advance']['advance_salary']  !== null )
                <td>No advance</td>
            @else
               <td> {{  $employee['advance']['advance_salary'] }} </td>
            @endif
            @php
                $amount = $employee->salary -  $employee['advance']['advance_salary'];
            @endphp
            <td>

                <strong style="color:#fff;">{{ round($amount) }} </strong>
            </td>
            <td>{{ $employee->paid_amount }}</td>
            <td>{{ $employee->due_salary }}</td>
            <th>
                <a href="{{ route('advance.salary.edit',$employee->id) }}" class="btn btn-primary">Pay Now</a>
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
