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
                                    <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Employee Info</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Employee Name</label>
                                                    <input type="text"
                                                           name="name"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           id="firstname"
                                                           placeholder="Enter Name"
                                                           value="">

                                                    @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Employee Email</label>
                                                    <input type="email"
                                                           name="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email"
                                                           placeholder="Enter Email"
                                                           value="">

                                                    @error('email')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Employee Phone</label>
                                                    <input type="text"
                                                           name="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           id="phone"
                                                           placeholder="Enter phone"
                                                           value="">

                                                    @error('phone')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Employee Address :</label>
                                                    <input type="text"
                                                           name="address"
                                                           class="form-control @error('address') is-invalid @enderror"
                                                           id="address"
                                                           placeholder="Enter Address"
                                                           value="">

                                                    @error('address')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div> <!-- end col -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="experience" class="form-label">Employee Experience :</label>
                                                    <select name="experience" id="inputState" class="form-select @error('experience') is-invalid @enderror">
                                                        <option selected="">Choose</option>
                                                        <option value="1 year">1 Year</option>
                                                        <option value="2 year">2 Year</option>
                                                        <option value="3 year">3 Year</option>
                                                    </select>
                                                    @error('experience')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror

                                                </div>
                                            </div> <!-- end col -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="salary" class="form-label">Employee Salary</label>
                                                    <input type="text"
                                                           name="salary"
                                                           class="form-control @error('salary') is-invalid @enderror"
                                                           id="salary"
                                                           placeholder="Enter Salary"
                                                           value="">

                                                    @error('salary')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="example-fileinput" class="form-label">Employee Image</label>
                                                    <input name="image"
                                                           type="file"
                                                           id="image"
                                                           class="form-control @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                    <br>
                                                    <img src="{{ url('upload/no_image.jpg') }}"
                                                         class="rounded-circle avatar-lg img-thumbnail"
                                                         id="showImage"
                                                         alt="profile-image">
                                                </div>
                                            </div> <!-- end col -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="vacation" class="form-label">Employee Vacation</label>
                                                    <input type="text"
                                                           name="vacation"
                                                           class="form-control @error('vacation') is-invalid @enderror"
                                                           id="vacation"
                                                           placeholder="Enter Vacation"
                                                           value="">

                                                    @error('vacation')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">Employee City</label>
                                                    <input type="text"
                                                           name="city"
                                                           class="form-control @error('city') is-invalid @enderror"
                                                           id="city"
                                                           placeholder="Enter City"
                                                           value="">

                                                    @error('city')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>


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
