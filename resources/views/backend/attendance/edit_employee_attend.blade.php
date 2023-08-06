@extends('admin_dashboard')
@section('admin')
    <link rel="stylesheet" href="{{asset('backend/assets/css/attend.css')}}">
    <style>
        .switch-toggle{
            width: auto;
        }
        .switch-toggle label:not(.disabled){
            cursor: pointer;
        }
        .switch-candy a{
            border: 1px solid #333;
            border-radius: 3px;
            background-color: white;
            background-image: -webkit-linear-gradient(top,rgba(255, 255, 255, 0.2), transparent);
            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), transparent);
        }
        .switch-toggle.switch-candy, .switch-light.switch-candy > span{
            background-color: #5a6268;
            border-radius: 3px;
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255, 255, 255, 0.2);
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <h4>
                                    <a href="#" class="btn btn-primary float-sm-right"> <i class="fas fa-list"></i>Edit Employee Attendance </a>
                                </h4>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">




                        <div class="card-body">
<form action="{{ route('update.employee.attend',['id' => $employee['attendance']['id']]) }}" method="post" id="myForm">
    @csrf
    <div class="form-group col-md-4">
        <label for="date" class="control-label">Attendance Date</label>
        <input type="date"
               name="date"
               id="date"
               class="checkdate form-control form-control-sm singledatepicker"
               placeholder="Attendance Date"

               value="{{ date('Y-m-d', strtotime($employee['attendance']['date'])) }}"

               autocomplete="off">
    </div>
    <table class="table sm table-bordered table-striped dt-responsive" style="width: 100%">
        <thead>
        <tr>
            <th rowspan="2" class="text-center" style="vertical-align: middle">Sl.</th>
            <th rowspan="2" class="text-center" style="vertical-align: middle">Employee Name</th>
            <th colspan="3" class="text-center" style="vertical-align: middle">Attendance Status</th>
        </tr>
        <tr>
            <th class="text-center btn present_all" style="display: table-cell;background-color:#114190">Present</th>
            <th class="text-center btn leave_all" style="display: table-cell;background-color:#114190">Leave</th>
            <th class="text-center btn absent_all" style="display: table-cell;background-color:#114190">Absent</th>
        </tr>
        </thead>
        <tbody>

            <tr  class="text-center">

{{--                                <input type="hidden" name="employee_id[]" value="{{$item->id}}" class="employee_id">--}}
                <td>{{$employee['attendance']['id']}}</td>
                <td>{{$employee['name']}}</td>
                <td colspan="3">
                    <div class="switch-toggle switch-3 switch-candy">
                        <input class="present"
                               id="present{{$employee['id']}}"
                               name="attend_status[{{$employee['id']}}]"
                               value="present"
                               type="radio"
                               {{ $employee['attendance']['attend_status'] == 'present' ? 'checked' : '' }} >

                        <label for="present{{$employee['id']}}">Present</label>
                        <input class="leave"
                               id="leave{{$employee['id']}}"
                               name="attend_status[{{$employee->id}}]"
                               value="Leave"
                               type="radio"
                            {{ $employee['attendance']['attend_status'] == 'Leave' ? 'checked' : '' }} >

                        <label for="leave{{$employee['id']}}">Leave</label>
                        <input class="absent"
                               id="absent{{$employee['id']}}"
                               name="attend_status[{{$employee->id}}]"
                               value="Absent"
                               type="radio"
                            {{ $employee['attendance']['attend_status'] == 'Absent' ? 'checked' : '' }}>

                        <label for="absent{{$employee['id']}}">Absent</label>
                        <a></a>
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
    <button type="submit" class="btn btn-success btn-sm"> Submit </button>
</form>
                        </div>
                        <!-- end card body-->

                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->
        </div>
        <!-- container -->
    </div>
    <!-- content -->

    <script type="text/javascript">
        $(document).on('click','.present',function(){
            $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
        });
        $(document).on('click','.leave',function(){
            $(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
        });
        $(document).on('click','.absent',function(){
            $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
        });
    </script>
    <script type="text/javascript">
        $(document).on('click','.present_all',function(){
            $("input[value=Present]").prop('checked',true);
            $('.datetime').css('ponter-events','none').css('background-color','#dee2e6').css('color','#495057');
        });
        $(document).on('click','.leave_all',function(){
            $("input[value=Leave]").prop('checked',true);
            $('.datetime').css('ponter-events','').css('background-color','white').css('color','#495057');
        });
        $(document).on('click','.absent_all',function(){
            $("input[value=Absent]").prop('checked',true);
            $('.datetime').css('ponter-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
        });
    </script>


@endsection
