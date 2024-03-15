<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#ffffff">
    <script src="/themes/public/assets/js/config.js"></script>
    <script src="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/themes/public/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/themes/public/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/themes/public/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/themes/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <title> Scope Visions | Attendance List</title>
</head>
<body>
    <div class="container mt-2">
        @if (Session::has('error_message'))

        <div class="alert alert-danger alert-dismissible fade show px-4 d-flex justify-content-center flex-column" role="alert">
         <strong>Error</strong> {{ Session::get('error_message'); }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>

       @endif
       @if (Session::has('success_message'))

       <div class="alert alert-success alert-dismissible fade show px-4 d-flex justify-content-center flex-column" role="alert">
         <strong>Success:</strong> {{ Session::get('success_message'); }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>

       @endif
       @if ($errors->any())
       <div class="alert alert-danger alert-dismissible fade show px-4 d-flex justify-content-center flex-column" role="alert">
             @foreach ($errors->all() as $item)
               <li style="list-style: none">{{ $item }}</li>
             @endforeach
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('employeeDashboardPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h4 class="text-end">Attendance List</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12 py-2">
                    <div class="py-2 d-flex justify-content-end align-items-center">
                        {{-- <a href="{{ route('checkEmployeePresentOrAbsent') }}" class="btn btn-outline-primary"><i class="mx-2 fas fa-check"></i>Check Attendance</a> --}}
                        <a href="{{ route('addNewEmployeesAttendancePage') }}" class="btn btn-outline-primary mx-2"><i class="mx-2 fas fa-plus"></i>Add More</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                @if ($selectEmployees->isEmpty())
                                    
                                @else
                                    
                                
                                @foreach ($selectEmployees as $selectEmployeess)
                                @endforeach
                                @if ( \DB::table('attendance_employees')->where('id','=',$selectEmployeess->id)->whereNotNull('clockOutDate')->count() > 0 )
                                <th scope="col" style="width: 20%;text-align:center">
                                    Date
                                </th>
                                <th scope="col" style="width: 20%;text-align:center">
                                    Employee
                                </th>
                                <th scope="col" style="width: 20%;text-align:center">
                                    Clock In
                                </th>
                                <th scope="col" style="width: 20%;text-align:center">
                                    Clock Out
                                </th>
                                <th scope="col" style="width: 20%;text-align:center">
                                    Late Time
                                </th>    
                                @else
                                <th scope="col" style="width: 15%;text-align:center">
                                    Date
                                </th>
                                <th scope="col" style="width: 35%;text-align:center">
                                    Employee
                                </th>
                                <th scope="col" style="width: 15%;text-align:center">
                                    Clock In
                                </th>
                                <th scope="col" style="width: 15%;text-align:center">
                                    Clock Out
                                </th>
                                <th scope="col" style="width: 20%;text-align:center">
                                    Late Time
                                </th>
                                <th scope="col" style="width: 5%;text-align:center">
                                    Menu
                                </th>
                                @endif
                                @endif
                            </tr>
                        </thead>
                        @if ($selectEmployees->isEmpty())
                            
                        @else
                        <tbody id="clientData">
                            <div id="total_records">
                            @foreach ($selectEmployees as $selectEmployeess)
                            <tr>
                                @if ( \DB::table('attendance_employees')->where('id','=',$selectEmployeess->id)->whereNotNull('clockOutDate')->count() > 0 )
                                <td  style="width: 20%;text-align:center">
                                    {{ \Carbon\Carbon::parse($selectEmployeess->clockInDate)->format('M d, Y') }}
                                </td>
                                <td  style="width: 20%;text-align:center">
                                    {{ $selectEmployeess->employeename }}
                                </td>
                                <td  style="width: 20%;text-align:center">
                                    {{-- {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:m:i') }} --}}
                                    {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:i A') }}
                                </td>
                                <td  style="width: 20%;text-align:center">
                                    
                                    @if (empty($selectEmployeess->clockOutTime))
                                    @else
                                    {{ \Carbon\Carbon::parse($selectEmployeess->clockOutTime)->format('h:i A') }}
                                    @endif
                                </td>
                                <td  style="width: 20%;text-align:center">
                                    {{ $selectEmployeess->lateTime }}
                                </td>
                                @else
                                <td  style="width: 15%;text-align:center">
                                    {{ \Carbon\Carbon::parse($selectEmployeess->clockInDate)->format('M d, Y') }}
                                </td>
                                <td  style="width: 35%;text-align:center">
                                    {{ $selectEmployeess->employeename }}
                                </td>
                                <td  style="width: 15%;text-align:center">
                                    {{ \Carbon\Carbon::parse($selectEmployeess->clockInTime)->format('h:i A') }}
                                </td>
                                <td  style="width: 15%;text-align:center">
                                    
                                    @if (empty($selectEmployeess->clockOutTime))
                                    @else
                                    {{ \Carbon\Carbon::parse($selectEmployeess->clockOutTime)->format('h:i A') }}
                                    @endif
                                </td>
                                <td  style="width: 20%;text-align:center">
                                    {{ $selectEmployeess->lateTime }}
                                </td>
                                <td  style="width: 5%;text-align:center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="#" class="action-icon dropdown-toggle text-black" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bars"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                  <a class="dropdown-item" href="{{ route('attendanceEmployeesEditPage',$selectEmployeess->id) }}"><i class="fas fa-edit mx-2"></i> Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                                
                            </tr>
                            @endforeach
                            </div>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
         <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Select Stock Type</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="d-flex justify-content-center align-items-center">
                <div class="d-flex mx-1">
                    <a href="{{ route('createStockScopesPartsPage') }}" class="btn btn-outline-primary">New Stock For Repairing Parts</a>
                </div>
                <div class="d-flex mx-1">
                    <a href="{{ route('createStockOtherPage') }}" class="btn btn-outline-primary">New Stock For Other Items</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="/themes/public/vendors/popper/popper.min.js"></script>
    <script src="/themes/public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/themes/public/vendors/anchorjs/anchor.min.js"></script>
    <script src="/themes/public/vendors/is/is.min.js"></script>
    <script src="/themes/public/vendors/echarts/echarts.min.js"></script>
    <script src="/themes/public/vendors/fontawesome/all.min.js"></script>
    <script src="/themes/public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/themes/public/vendors/list.js/list.min.js"></script>
    <script src="/themes/public/assets/js/theme.js"></script>
    <script src="/jquery-3.7.1.min.js"></script>
</body>
</html>