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
    <title>Scope Visions | Edit Outgoing Inspection</title>
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
                            <a href="{{ route('withoutTjfInspectionOutgoingListPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h3 class="text-end">Edit Outgoing Inspection Report</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($selectIncomingInspectionReportsss as $selectIncomingInspectionReport)
                                
                @endforeach
                <form action="{{ route('updateWithoutTjfInspectionOutgoingReport',$selectIncomingInspectionReport->id) }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-10 py-2 px-2">
                        <div class="row px-2 py-2">
                            <h5>Scope Basic Information</h5>
                           
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Model:</label>
                                <input type="text" class="form-control" placeholder="Ex, gif-140" name="scopeModel" value="{{ $selectIncomingInspectionReport->scope_model }}">
                                <input type="text" class="form-control" placeholder="Ex, gif-140" name="companyId" value="{{ $selectIncomingInspectionReport->company_id }}" style="display: none">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Incoming Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-2023" name="scopeIncomingDate" value="{{ $selectIncomingInspectionReport->scope_incoming_date }}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sr Number:</label>
                                <input type="number" class="form-control" placeholder="Ex, 123456789" name="scopeSrNumber" value="{{ $selectIncomingInspectionReport->scope_sr_number }}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sender Name:</label>
                                <input type="text" class="form-control" placeholder="Ex, Demo Person" name="scopeSenderName" value="{{ $selectIncomingInspectionReport->sender_name }}">
                            </div>
                        </div>
                        {{--  --}}
                        <br>
                        <h5>Scope Received With</h5>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Received With:</label>
                                <textarea name="scopeReceivedWith" id="scopeReceivedWith" cols="30" rows="6" class="form-control" placeholder="Ex, Demo Data">{{ $selectIncomingInspectionReport->scope_sending_with }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        <br>
                        <h5>Inspection Related Information</h5>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Leakage:</label>
                                <select name="scopeLeakage" id="scopeLeakage" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_leakage == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">View:</label>
                                <select name="scopeView" id="scopeView" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_view == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Light Guide:</label>
                                <select name="scopeLightGuide" id="scopeLightGuide" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_lightguide == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Air/Water:</label>
                                <select name="scopeairwater" id="scopeairwater" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_airwater == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Angulations:</label>
                                <select name="scopeAngulation" id="scopeAngulation" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_angulation == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">LG Tube:</label>
                                <select name="scopeLgTube" id="scopeLgTube" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_lgtube == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Insertion Tube:</label>
                                <select name="scopeInsertionTube" id="scopeInsertionTube" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_insertiontube == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Biopsy Channel:</label>
                                <select name="scopeBiopsyChannel" id="scopeBiopsyChannel" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_biopsychannel == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Objective Lenz:</label>
                                <select name="scopeObjectiveLenz" id="scopeObjectiveLenz" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_objectivelenz == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Suction:</label>
                                <select name="scopeSuction" id="scopeSuction" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_suction == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Angulation Lock:</label>
                                <select name="scopeAngulationLock" id="scopeAngulationLock" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_angulation_lock == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Freeze Buttons:</label>
                                <select name="scopeFreezeButtons" id="scopeFreezeButtons" class="form-control">
                                    @if ($selectIncomingInspectionReport->scope_freezing_buttons == 1)
                                    <option value="1">Ok</option>
                                    <option value="0">Not Ok</option>
                                    @else
                                    <option value="0">Not Ok</option>
                                    <option value="1">Ok</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--  --}}
                        <br>
                        <h5>Your Remarks In Details</h5>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Remarks:</label>
                                <textarea name="scopeRemarks" id="scopeRemarks" cols="30" rows="10" class="form-control" placeholder="Ex, Describe Scope Fault And Your Remarks In Details">{{ $selectIncomingInspectionReport->remarks }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        <br>
                        <h5>Scope Checked And Inspected By</h5>
                        {{--  --}}
                        @if ($selectEmployees->isEmpty())
                        @else
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Inspected By:</label>
                                <select name="scopeInspectedBy" id="scopeInspectedBy" class="form-control">
                                    <option value="{{ $selectIncomingInspectionReport->inspectedby_id }}">{{ $selectIncomingInspectionReport->employeename }}</option>
                                    @foreach ($selectEmployees as $selectEmployee)
                                    <option value="{{ $selectEmployee->id }}">{{ $selectEmployee->employeename }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        {{--  --}}
                    </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </form>
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
    <script src="/custom.js"></script>
</body>
</html>