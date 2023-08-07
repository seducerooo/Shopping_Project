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
                                <!-- Sign Up modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">Add Category</button>
                                <!-- Log In modal -->
                            </ol>
                        </div>
                        <h4 class="page-title">All Category</h4>
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
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Action</th>

                                </tr>
                                </thead>


                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <a href="{{ route('edit.category',[ 'id' => $category->id]) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{ route('destroy.category',$category->id) }}" class="btn btn-danger" id="delete"><i class="fa-solid fa-trash"></i></a>
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
    <!-- Signup modal content -->
    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">


                    <form class="px-3" action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Category Name</label>
                            <input name="category_name"
                                   class="form-control"
                                   type="text"
                                   id="username"
                                   required=""
                                   placeholder="Michael Zenaty">
                        </div>



                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">
                                Save Changes
                            </button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
