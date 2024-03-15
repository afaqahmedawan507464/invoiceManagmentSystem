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
    <title>Scope Visions | Leaves List</title>
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
                            <a href="{{ route('adminDashboardPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h4 class="text-end">Remaining Approved Leave List</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="col-12 py-2">
                    <div class="py-2 d-flex justify-content-end align-items-center">
                        <a href="{{ route('createLeavePage') }}" class="btn btn-outline-primary"><i class="mx-2 fas fa-plus"></i>Add More</a>
                    </div>
                </div> --}}
                @if ($selectLeaveData->isEmpty())
                    
                @else
                <div class="row py-2">
                @foreach ($selectLeaveData as $selectLeaveDatas)
                <div class="col-sm-6 col-md-3 d-flex align-items-stretch flex-column px-2 py-2">
                   <div class="card bg-light d-flex flex-fill">
                      <div class="card-body">
                         <div class="row py-2">
                            <div class="col-12" style="padding-left: 90%;">
                                <a href="#" class="action-icon dropdown-toggle text-black" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                @if ( $selectLeaveDatas->leave_status == '1' )
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                  <a class="dropdown-item" href=""> View Leave</a>
                                  <a class="dropdown-item" href=""> Delete</a>
                                </div>
                                @else
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                  <a class="dropdown-item" href="{{ route('approveLeave',$selectLeaveDatas->id) }}"> Approved</a>
                                  <a class="dropdown-item" href="{{ route('rejectedLeave',$selectLeaveDatas->id) }}"> Rejected</a>
                                  <a class="dropdown-item" href="{{ route('leaveDetails',$selectLeaveDatas->id) }}"> View Leave</a>
                                  <a class="dropdown-item" href="{{ route('removeLeaveOperation',$selectLeaveDatas->id) }}"> Delete</a>
                                </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <span style="font-size: 20px;">{{ $selectLeaveDatas->employeename }}</span>
                                <br>
                                <span style="font-size: 12px;">Date: {{ \Carbon\Carbon::parse($selectLeaveDatas->leave_starting_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($selectLeaveDatas->leave_ending_date)->format('M d, Y') }}</span>
                                <br>
                                @if( $selectLeaveDatas->leave_duration  == "1")
                                <span style="font-size: 12px;">Duration: Full Day Leave</span>
                                @endif
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                @endforeach
                </div>
                @endif
                
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