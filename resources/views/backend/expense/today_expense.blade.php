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
                                <a href="{{ route('add.expense') }}" class="btn btn-primary rounded-pill waves-effect waves-light">
                                    Add Expense
                                </a>
                            </ol>
                        </div>
                        <h4 class="page-title">Today Expense</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @php
            $date = date('d-m-Y');
             $expense = App\Models\Expense::query()->where('date',$date)->sum('amount');
            @endphp


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="header-title"> Today Expense</h4>
                            <h4 style="color: white; font-size: 30px" align="center"> Total :  ${{ $expense }}</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($today as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{!! $expense['details'] !!}</td>
                                        <td>{{ $expense['amount'] }}</td>
                                        <td>{{ $expense['month'] }}</td>
                                        <td>{{ $expense['year'] }}</td>
                                        <th>
                                            <a href="{{ route('edit.expense',$expense->id) }}" class="btn btn-primary">edit</a>
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
