@extends('admin_dashboard')
@section('admin')


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">All Employee</h4>
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
                                    <th>Attend Status</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>{{ $allEmployee['id'] }}</td>
                                        <td><img
                                                src="{{ !empty($allEmployee->image) ?
                                                asset($allEmployee->image) :
                                                url('upload/no_image.jpg') }}"
                                                width="50px"
                                                height="40px"
                                            />
                                        </td>
                                        <td>{{ $allEmployee->name }}</td>
                                        <td>{{ $allEmployee['attendance']['date'] }}</td>
                                        <td>{{ $allEmployee['attendance']['attend_status'] }}</td>
                                    </tr>

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
