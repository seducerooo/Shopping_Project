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
                                <a href="#" class="btn btn-primary rounded-pill waves-effect waves-light">
                                    <i class="fa-solid fa-download"></i> Download Xlsx File
                                </a>
                            </ol>
                        </div>
                        <h4 class="page-title">Import Product</h4>
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

    <div class="row">

        {{--         Product Name       --}}

        <div class="col-md-6">
            <div class="mb-3">
                <label for="import_file" class="form-label">Xlsx File Import :</label>
                <br><br>
                <input type="file"
                       name="import_file"
                       class="form-control  @error('product_name') is-invalid @enderror"
                       id="import_file"
                       value="">
                @error('product_name')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>




    </div> <!-- end row -->

    <div class="text-end">
        <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
            <i class="mdi mdi-content-save"></i> Upload
        </button>
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

@endsection
