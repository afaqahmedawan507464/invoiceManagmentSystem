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
    <title>Attendance</title>
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
                            <a href="{{ route('leaveListPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h2 class="text-end">Leave Detail Form</h2>
                        </div>
                    </div>
                </div>
            </div>
            @if ($selectLeaveData->isEmpty())
                
            @else
                @foreach ($selectLeaveData as $selectLeaveDatas)
                    
                @endforeach
                <div class="card-body">
                    {{-- <form action="{{ route('createOperationLeavePage') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf --}}
                        <div class="col-10 py-2 px-2">
                            <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                    <input type="date" class="form-control" placeholder="Ex, demo client" name="leaveDate" value="{{ $selectLeaveDatas->leaveDate }}" disabled >
                                </div>
                            </div>
                            
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Employees:</label>
                                    <select name="employeeId" id="employeeId" class="form-control" disabled >
                                        <option value="">{{ $selectLeaveDatas->employeename }}</option>
                                    </select>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Duration:</label>
                                    <select name="leaveDuration" id="leaveDuration" class="form-control" disabled >
                                        <option value="1">Full Day</option>
                                    </select>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Leave Date ( Starting ):</label>
                                    <input type="date" class="form-control" placeholder="Ex, demo client" name="leaveStartDate" value="{{ $selectLeaveDatas->leave_starting_date }}" disabled >
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Leave Date ( Ending ):</label>
                                    <input type="date" class="form-control" placeholder="Ex, demo client" name="leaveEndingDate" value="{{ $selectLeaveDatas->leave_ending_date }}" disabled >
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Reason:</label>
                                    <textarea name="reasonLeave" id="reasonLeave" cols="30" rows="5" class="form-control" placeholder="Ex, reason in detail" disabled >{{ $selectLeaveDatas->reason }}</textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                        {{-- <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>
                    </form> --}}
                </div>
            @endif
            
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
    <script src="/custom.js"></script>
</body>
</html>