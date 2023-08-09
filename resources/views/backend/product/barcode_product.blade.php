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
                                <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('all.product') }}"><i class="fa-solid fa-backward"></i> Back</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Barcode Product</h4>
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

    <div class="row">

        {{--         Product Name       --}}
        @php
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        @endphp
        <div class="col-md-12">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Code</label>
                <h3> {{ $product->product_code }}</h3>
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

        <div class="col-md-12">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product BarCode</label>
                <h3> {!! $generator->getBarcode($product->product_code,$generator::TYPE_CODE_128) !!}</h3>
            </div>
        </div>
    </div> <!-- end row -->

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
