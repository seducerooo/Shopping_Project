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
                                <a href="{{ route('add.product') }}" class="btn btn-primary rounded-pill waves-effect waves-light">
                                    Add Customer
                                </a>
                            </ol>
                        </div>
                        <h4 class="page-title">All Product</h4>
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
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($product as $key => $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img
                                                src="{{ !empty($item->product_image) ?
                                                asset($item->product_image) :
                                                url('upload/no_image.jpg') }}"
                                                width="50px"
                                                height="40px"
                                            />
                                        </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item['supplier']['name'] }}</td>
                                        <td>{{ $item['category']['category_name'] }}</td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <th>
                                            <a href="{{ route('product.edit',['id' => $item->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('barcode.product',['id' => $item->id]) }}" class="btn btn-info"><i class="fa-solid fa-barcode"></i></a>
                                            <a href="{{ route('product.destroy',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a>
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
