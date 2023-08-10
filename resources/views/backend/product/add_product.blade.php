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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Profile</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Add Employee</h4>
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
<form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Product into</h5>



    <div class="row">

                           {{--         Product Name       --}}

        <div class="col-md-6">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text"
                       name="product_name"
                       class="form-control  @error('product_name') is-invalid @enderror"
                       id="product_name"
                       placeholder="Product Name"
                       value="">
                @error('product_name')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>

                                  {{--         Category_id       --}}

        <div class="col-md-6">
            <div class="mb-3">
                <label for="category_id" class="form-label">Category :</label>
                <select name="category_id" id="category_id" class="form-select   @error('category_id') is-invalid @enderror">
                    <option selected="" disabled>Select Category</option>
                    @foreach($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger"> {{ $message }} </span>
                @enderror

            </div>
        </div> <!-- end col -->



        <div class="col-md-6">
            <div class="mb-3">
                <label for="year" class="form-label">Supplier :</label>
                <select name="supplier_id" id="year" class="form-select @error('supplier_id') is-invalid @enderror">
                    <option selected="" disabled>Select Supplier</option>
                    @foreach($supplier as $supp)
                        <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                    @endforeach
                </select>

                @error('supplier_id')
                <span class="text-danger"> {{ $message }} </span>
                @enderror

            </div>
        </div> <!-- end col -->




{{--        <div class="col-md-6">--}}
{{--            <div class="mb-3">--}}
{{--                <label for="product_code" class="form-label">Product Code</label>--}}
{{--                <input type="text"--}}
{{--                       name="product_code"--}}
{{--                       class="form-control @error('product_code') is-invalid @enderror"--}}
{{--                       id="product_code"--}}
{{--                       placeholder="Enter Product Code"--}}
{{--                       value="">--}}

{{--                @error('product_code')--}}
{{--                <span class="text-danger"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div> <!-- end col -->--}}





        <div class="col-md-6">
            <div class="mb-3">
                <label for="product_garage" class="form-label">Product Garage :</label>
                <input type="text"
                       name="product_garage"
                       class="form-control"
                       id="product_garage"
                       placeholder="Enter product_garage">
            </div>
        </div> <!-- end col -->




        <div class="col-md-6">
            <div class="mb-3">
                <label for="product_store" class="form-label">Product Store :</label>
                <input type="text"
                       name="product_store"
                       class="form-control"
                       id="product_store"
                       placeholder="Enter Product Store">

            </div>
        </div> <!-- end col -->





        <div class="col-md-6">
            <div class="mb-3">

        <label for="buying_date" class="control-label">Buying Date</label>
        <input type="date"
               name="buying_date"
               id="buying_date"
               class="checkdate form-control form-control-sm singledatepicker"
               placeholder="Attendance Date"
               autocomplete="off">

            </div>
        </div>




        <div class="col-md-6">
            <div class="mb-3">
                <label for="expire_date" class="controlbuying_price Date">Price Date</label>
                <input type="date"
                       name="expire_date"
                       id="expire_date"
                       class="checkdate form-control form-control-sm singledatepicker"
                       placeholder="price Date"
                       autocomplete="off" >

            </div>
        </div>


        <div class="col-md-6">
            <div class="mb-3">
                <label for="buying_price" class="form-label">Buying price</label>
                <input type="text"
                       name="buying_price"
                       class="form-control"
                       id="buying_price"
                       placeholder="Enter Account Holder"
                       value="">
            </div>
        </div>


        <div class="col-md-12">
            <div class="mb-3">
                <label for="selling_price" class="form-label">Selling price</label>
                <input type="text"
                       name="selling_price"
                       class="form-control"
                       id="selling_price"
                       placeholder="Enter Account Number"
                       value="">
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="product_image" class="formproduct_storeProduct Image"></label>
                <input name="product_image"
                       type="file"
                       id="product_image"
                       class="form-control @error('product_image') is-invalid @enderror">
                <img src="{{ url('upload/no_image.jpg') }}"
                     class="rounded-circle avatar-lg img-thumbnail"
                     id="showImage"
                     alt="profile-image">


                @error('product_image')
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
