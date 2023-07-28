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
<form action="{{ route('customer.update',$customer->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Customer Info</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Customer Name</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       id="firstname"
                       placeholder="Enter Name"
                       value="{{ $customer->name }}">

                @error('name')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Customer Email</label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       placeholder="Enter Email"
                       value="{{ $customer->email }}">

                @error('email')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div> <!-- end col -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Customer Phone</label>
                <input type="text"
                       name="phone"
                       class="form-control @error('phone') is-invalid @enderror"
                       id="phone"
                       placeholder="Enter phone"
                       value="{{ $customer->phone }}">

                @error('phone')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div> <!-- end col -->

        <div class="col-md-6">
            <div class="mb-3">
                <label for="address" class="form-label">Customer Address :</label>
                <input type="text"
                       name="address"
                       class="form-control @error('address') is-invalid @enderror"
                       id="address"
                       placeholder="Enter Address"
                       value="{{ $customer->address }}">

                @error('address')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div> <!-- end col -->


        <div class="col-md-6">
            <div class="mb-3">
                <label for="shopname" class="form-label">Customer Shop Name :</label>
                <input type="text"
                       name="shopname"
                       class="form-control @error('shopname') is-invalid @enderror"
                       id="shopname"
                       placeholder="Enter Shop Name"
                       value="{{ $customer->shopname }}">
                @error('shopname')
                <span class="text-danger"> {{ $message }} </span>
                @enderror

            </div>
        </div> <!-- end col -->


        <div class="col-md-6">
            <div class="mb-3">
                <label for="account_holder" class="form-label">Customer Account Holder</label>
                <input type="text"
                       name="account_holder"
                       class="form-control @error('account_holder') is-invalid @enderror"
                       id="account_holder"
                       placeholder="Enter Account Holder"
                       value="{{ $customer->account_holder }}">

                @error('account_holder')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="mb-3">
                <label for="account_number" class="form-label">Customer Account Number</label>
                <input type="text"
                       name="account_number"
                       class="form-control @error('account_number') is-invalid @enderror"
                       id="account_number"
                       placeholder="Enter account_number"
                       value="{{ $customer->account_number }}">

                @error('account_number')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>



        <div class="col-md-6">
            <div class="mb-3">
                <label for="bank_name" class="form-label">Customer Bank Name</label>
                <input type="text"
                       name="bank_name"
                       class="form-control @error('bank_name') is-invalid @enderror"
                       id="bank_name"
                       placeholder="Enter Bank Name"
                       value="{{ $customer->bank_name }}">

                @error('bank_name')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>




        <div class="col-md-6">
            <div class="mb-3">
                <label for="bank_branch" class="form-label">Customer Bank Branch</label>
                <input type="text"
                       name="bank_branch"
                       class="form-control @error('bank_branch') is-invalid @enderror"
                       id="bank_branch"
                       placeholder="Enter Bank Name"
                       value="{{ $customer->bank_branch }}">

                @error('bank_branch')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="mb-3">
                <label for="city" class="form-label">Customer City</label>
                <input type="text"
                       name="city"
                       class="form-control @error('city') is-invalid @enderror"
                       id="city"
                       placeholder="Enter City"
                       value="{{ $customer->city }}">

                @error('city')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
        </div>


        <div class="col-md-12">
            <div class="mb-3">
                <label for="example-fileinput" class="form-label">Customer Image</label>
                <input name="image"
                       type="file"
                       id="image"
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="text-danger"> {{ $message }} </span>
                @enderror
                <br>
                <img src="{{ !empty( $customer->image) ? url($customer->image) : 'upload/no_image.jpg' }}"
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
