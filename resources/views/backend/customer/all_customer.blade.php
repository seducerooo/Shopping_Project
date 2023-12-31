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
                                <a href="{{ route('add.customer') }}" class="btn btn-primary rounded-pill waves-effect waves-light">
                                    Add Customer
                                </a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Customer</h4>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Shop Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($allCustomer as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td><img
                                        src="{{ !empty($customer->image) ?
                                                asset($customer->image) :
                                                url('upload/no_image.jpg') }}"
                                        width="50px"
                                        height="40px"
                                        />
                                    </td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->shopname }}</td>
                                    <th>
                                        <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-primary">edit</a>
                                        <a href="{{ route('customer.destroy',$customer->id) }}" class="btn btn-danger" id="delete">delete</a>
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
