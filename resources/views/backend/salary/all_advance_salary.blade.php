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
                        <h4 class="page-title">All Advance Salary</h4>
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
                                    <th>Year</th>
                                    <th>Advance Salary</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($salaries as $salary)
                                    <tr>
                                        <td>{{ $salary->id }}</td>
                                        <<td><img src="{{ asset($salary['employee']['image']) }}" width="30px" height="30px" ></td>
                                        <td>{{ $salary['employee']['name'] }}</td>
                                        <td>{{ $salary->month }}</td>
                                        <td>{{ $salary->year }}</td>
                                        @if( $salary['advance_salary'] == NULL)
                                            <td>No advance</td>
                                        @else
                                            <td> {{  $salary['advance_salary'] }} </td>
                                        @endif
                                        <th>
                                            <a href="{{ route('advance.salary.edit',$salary->id) }}" class="btn btn-primary">edit</a>
                                            <a href="{{ route('advance.salary.delete',$salary->id) }}" class="btn btn-danger" id="delete">delete</a>
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
