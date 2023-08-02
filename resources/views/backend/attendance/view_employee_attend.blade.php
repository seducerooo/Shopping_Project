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
                                <a href="{{ route('add.employee.attend') }}" class="btn btn-primary rounded-pill waves-effect waves-light">
                                    Add Employee Attendance
                                </a>
                            </ol>
                        </div>
                        <h4 class="page-title">All attendance</h4>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($allData as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td><img
                                                src="{{ !empty($data['employee']['image']) ?
                                                asset($data['employee']['image']) :
                                                url('upload/no_image.jpg') }}"
                                                width="50px"
                                                height="40px"
                                            />
                                        </td>
                                        <td>{{ $data['employee']['name'] }}</td>
                                        <td>   {{ date('y-m-d',strtotime($data->date))  }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit',$data->id) }}" class="btn btn-primary">view</a>
                                            <a href="{{ route('customer.edit',$data->id) }}" class="btn btn-primary">Edit</a>

                                        </td>
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
