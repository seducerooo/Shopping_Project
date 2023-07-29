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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Supplier</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Details Supplier</h4>
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
<form action="{{ route('supplier.update',$supplier->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Supplier Info</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">
                    Supplier Name
                </label>

                <p class="text-danger">{{ $supplier->name }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">
                    Supplier Email
                </label>

                <p class="text-danger">
                    {{ $supplier->email }}
                </p>

            </div>
        </div> <!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Supplier Phone</label>
                <p class="text-danger">{{ $supplier->phone }}</p>

            </div>
        </div> <!-- end col -->

        <div class="col-md-6">
            <div class="mb-3">
                <label for="address" class="form-label">Supplier Address :</label>
                <p class="text-danger">{{ $supplier->address }}</p>

            </div>
        </div> <!-- end col -->


        <div class="col-md-6">
            <div class="mb-3">
                <label for="shopname" class="form-label">Supplier Shop Name :</label>
                <p class="text-danger">{{ $supplier->shopname }}</p>

            </div>
        </div> <!-- end col -->

        <div class="col-md-6">
            <div class="mb-3">
                <label for="type" class="form-label">Supplier Type :</label>
                <p class="text-danger">{{ $supplier->type }}</p>

            </div>
        </div> <!-- end col -->


        <div class="col-md-6">
            <div class="mb-3">
                <label for="account_holder" class="form-label">Supplier Account Holder</label>
                <p class="text-danger">{{ $supplier->account_holder }}</p>
            </div>
        </div>


        <div class="col-md-6">
            <div class="mb-3">
                <label for="account_number" class="form-label">Supplier Account Number</label>
                <p class="text-danger">{{ $supplier->account_number }}</p>
            </div>
        </div>



        <div class="col-md-6">
            <div class="mb-3">
                <label for="bank_name" class="form-label">Supplier Bank Name</label>
                <p class="text-danger">{{ $supplier->bank_name }}</p>
            </div>
        </div>




        <div class="col-md-6">
            <div class="mb-3">
                <label for="bank_branch" class="form-label">Supplier Bank Branch</label>
                <p class="text-danger">{{ $supplier->bank_branch }}</p>
            </div>
        </div>


        <div class="col-md-6">
            <div class="mb-3">
                <label for="city" class="form-label">Supplier City</label>
                <p class="text-danger">{{ $supplier->city }}</p>
            </div>
        </div>


        <div class="col-md-12">
            <div class="mb-3">
                <label for="example-fileinput" class="form-label">Supplier Image</label>
                <br>
                <img src="{{ asset($supplier->image) }}"
                     class="rounded-circle avatar-lg img-thumbnail"
                     id="showImage"
                     alt="profile-image">
            </div>
        </div> <!-- end col -->






    </div> <!-- end row -->

    <div class="text-end">
        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
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
