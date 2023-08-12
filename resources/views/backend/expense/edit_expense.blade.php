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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Expense</a></li>

                            </ol>
                        </div>
                        <h4 class="page-title">Edit Expense</h4>
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
                                    <form action="{{ route('update.expense',$expense->id) }}" method="post" enctype="multipart/form-data">

                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Employee Info</h5>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="expense_details" class="form-label">Expense Details</label>
                                                    <textarea class="form-control @error('details') is-invalid @enderror"
                                                              name="details"
                                                              id="expense_details"

                                                              rows="3">
                                                        {!! $expense->details !!}
                                                    </textarea>
                                                    @error('details')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="mb-3">

                                                    <input type="text"
                                                           name="amount"
                                                           class="form-control @error('amount') is-invalid @enderror"
                                                           id="expense_amount"
                                                           placeholder="Enter Expense Amount"
                                                           value="{{ $expense->amount }}">
                                                    @error('amount')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <input type="hidden"
                                                           name="month"
                                                           class="form-control"
                                                           id="expense_amount"
                                                           value="{{ $expense->month }}">

                                                </div>
                                            </div> <!-- end col -->



                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="hidden"
                                                           name="year"
                                                           class="form-control"
                                                           id="expense_amount"
                                                           value="{{ $expense->year }}">

                                                </div>
                                            </div> <!-- end col -->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <input type="hidden"
                                                           name="date"
                                                           id="date"
                                                           class="checkdate form-control form-control-sm singledatepicker"
                                                           value="{{ $expense->date }}"
                                                           autocomplete="off">

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

@endsection
