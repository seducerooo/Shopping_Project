@extends('admin_dashboard')
@section('admin')


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Yealy Expense</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @php
                $year = date('Y');
                 $expense_yearly = App\Models\Expense::query()->where('year',$year)->sum('amount');
            @endphp


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title"> Today Expense</h4>
                            <h4 style="color: white; font-size: 30px" align="center"> Total :  ${{ $expense_yearly }}</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Year</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($expense as $year)
                                    <td>{{ $year->id }}</td>
                                    <td>{!! $year['details'] !!}</td>
                                    <td>{{ $year['amount'] }}</td>
                                    <td>{{ $year['year'] }}</td>
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
