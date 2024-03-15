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
    <link rel="stylesheet" href="/project scope vision/quotation/quotation-disposible/with logo/With-Logo_quotation.css">
    <title>Scope Visions | Attendance Details</title>
    <style>
        @media print{
            .print *{
                display: none;
            }
            .printVisible, .printVisible *{
                visibility: visible !important;
            }

        }
    </style>
</head>
<body>
    <div class="container-fluid mt-2">
        
    <div class="bg-white py-2">
        
        {{--  --}}
        {{--  --}}
        <div class="row pt-1 px-2">
            @if($selectAttendanceDetails->isEmpty())
            @else
            @foreach ($selectAttendanceDetails as $selectAttendanceDetailss)
                    
            @endforeach
            <div class="col-12 py-1">
                <h3 class="text-center"><span class="mx-2" style="text-transform:capitalize;">{{ $selectAttendanceDetailss->employeename }}</span>Attendance Details Sheet</h3>
            </div>
            
            {{--  --}}
            <div class="col-12 print">
                <form action="{{ route('searchAttendanceMonthWiseAndYear',$selectAttendanceDetailss->employee_id) }}" method="post" class="d-flex justify-content-end align-items-center">
                    @csrf
                    <div>
                      <select class="form-control" name="searchByYearMonth">
                          <option value="">Select Month And Year</option>
                          
                        @php
                            $prevMonth = '';
                        @endphp
                        @if(isset($attendanceData))
                            @foreach ($attendanceData as $selectExpenses)
                                @php
                                    $currentMonth = \Carbon\Carbon::parse($selectExpenses->clockOutTime)->format('M,Y');
                                @endphp
                                @if($currentMonth != $prevMonth)
                                    <option value="{{ $selectExpenses->clockOutTime }}">{{ $currentMonth }}</option>
                                @endif
                                @php
                                    $prevMonth = $currentMonth;
                                @endphp
                            @endforeach
                        @endif
    
                        </select>
                    </div>
                     <button class="btn btn-outline-primary mx-3" type="submit">Search</button>
                  </form>
            </div>
            @endif
            {{--  --}}
            <div class="col-12 printVisible px-3">
                @if($selectAttendanceDetails->isEmpty())
                <h4 class="text-center py-2">Not Data Founded</h4>
                @else
                @foreach ($selectAttendanceDetails as $selectAttendanceDetailss)
                    
                @endforeach
                <div class="row">
                    <div class="col-6 py-1">
                        @if (empty($selectAttendanceDetailss->admin_user))
                           <span><b>Add Person:</b><span class="mx-2" style="text-transform: uppercase">"{{ Auth::guard('employee')->user()->employeename }}"</span></span> 
                        @elseif(empty($selectAttendanceDetailss->employee_user))
                            <span><b>Add Person:</b><span class="mx-2" style="text-transform: uppercase">" {{ Auth::guard('admin')->user()->adminname }} "</span></span>
                        @endif
                    </div>
                </div>
                   <div class="row px-3">
                      <div class="col-3 px-3 py-2 text-center d-flex justify-content-center align-items-center" style="border:1px solid black;">Year: {{ \Carbon\Carbon::parse($selectAttendanceDetailss->clockOutDate)->format('Y') }}</div>
                      <div class="col-3 px-3 py-2 text-center d-flex justify-content-center align-items-center" style="border:1px solid black;">Employee Name:</div>
                      <div class="col-6 px-3 py-2 text-center d-flex justify-content-center align-items-center" style="border:1px solid black;"><span style="text-transform: uppercase;font-size:25px;"><b>{{ $selectAttendanceDetailss->employeename }}</b></span></div>
                      <div class="col-3 px-3 py-1 text-center d-flex justify-content-center align-items-center" style="border:1px solid black;">Month: {{ \Carbon\Carbon::parse($selectAttendanceDetailss->clockOutDate)->format('M') }}</div>
                      <div class="col-3 px-3 py-1 text-center d-flex justify-content-center align-items-center" style="border:1px solid black;">Position/Post</div>
                      <div class="col-6 px-3 py-1 text-center d-flex justify-content-center align-items-center" style="border:1px solid black;">
                        @if ($selectAttendanceDetailss->user_type == 'computer operator')
                        <span>Computer Operator</span>
                        @elseif ($selectAttendanceDetailss->user_type == 'service engr')
                        <span>Service Engineer</span>
                        @else
                        <span>Engineer</span>
                        @endif
                    </div>
                   </div>
                   <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="py-2" style="width:13.33%;text-align:center;border:1px solid black">Date</th>
                            <th class="py-2" style="width:13.33%;text-align:center;border:1px solid black">In</th>
                            <th class="py-2" style="width:13.33%;text-align:center;border:1px solid black">Out</th>
                            <th class="py-2" style="width:13.33%;text-align:center;border:1px solid black">Late</th>
                            <th class="py-2" style="width:13.33%;text-align:center;border:1px solid black">Spend</th>
                            <th class="py-2" style="width:13.33%;text-align:center;border:1px solid black">Overtime</th>
                            <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Note</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach ($selectAttendanceDetails as $selectAttendanceDetailss)
                        <tr>
                            <td style="width:13.33%;text-align:center;border:1px solid black;font-size:12px;">{{ \Carbon\Carbon::parse($selectAttendanceDetailss->clockOutDate)->format('M d, Y') }}</td>
                            <td style="width:13.33%;text-align:center;border:1px solid black;font-size:12px;">{{ \Carbon\Carbon::parse($selectAttendanceDetailss->clockInTime)->format('h:i A') }}</td>
                            <td style="width:13.33%;text-align:center;border:1px solid black;font-size:12px;">{{ \Carbon\Carbon::parse($selectAttendanceDetailss->clockOutTime)->format('h:i A') }}</td>
                            <td style="width:13.33%;text-align:center;border:1px solid black;font-size:12px;">{{ $selectAttendanceDetailss->lateTime }}</td>
                            <td style="width:13.33%;text-align:center;border:1px solid black;font-size:12px;">{{ $selectAttendanceDetailss->total_hours }}</td>
                            <td style="width:13.33%;text-align:center;border:1px solid black;font-size:12px;">{{ $selectAttendanceDetailss->overTime }}</td>
                            <td style="width:20%;text-align:center;border:1px solid black;font-size:12px;">{{ $selectAttendanceDetailss->notes }}</td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                   </table>  
                   <div class="row">
                    <div class="col-12 d-flex justify-content-end align-items-center pt-1">
                        <div>
                        @php
                            $totalSeconds = 0;
                            foreach ($selectAttendanceDetails as $selectAttendanceDetailss) {
                            list($hours, $minutes, $seconds) = explode(':', $selectAttendanceDetailss->overTime);
                            $totalSeconds += $hours * 3600 + $minutes * 60 + $seconds; // Convert overtime duration to seconds and sum up
                             }

                          $totalOvertime = gmdate('H:i:s', $totalSeconds);
                        @endphp
                        <span><b>Total Overtime:</b><span class="mx-2">{{ $totalOvertime }}</span></span>
                        </div>
                    </div>
                    {{-- <div class="col-12 d-flex justify-content-end align-items-center pt-1">
                        <div>
                        @php
                            $totalSeconds = 0;
                            foreach ($selectAttendanceDetails as $selectAttendanceDetailss) {
                            list($hours, $minutes, $seconds) = explode(':', $selectAttendanceDetailss->total_hours);
                            $totalSeconds += $hours * 3600 + $minutes * 60 + $seconds; // Convert overtime duration to seconds and sum up
                             }

                          $totalOvertime = gmdate('H:i:s', $totalSeconds);
                        @endphp
                        <span><b>Total Hours Spends:</b><span class="mx-2">{{ $totalOvertime }}</span></span>
                        </div>
                    </div> --}}
                   </div>
                @endif
            </div>
        </div>
        {{--  --}}
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
<script src="/custom2.js"></script>
</body>
</html>