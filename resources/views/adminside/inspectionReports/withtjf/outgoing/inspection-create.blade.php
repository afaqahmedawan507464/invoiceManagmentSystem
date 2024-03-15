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
    <title> Scope Visions | New Outgoing Inspection</title>
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
                            <a href="{{ route('incomingAndOutGoingDailyRecordList') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h2 class="text-end">Outgoing Inspection Report</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($incomingInsppectionFormDatas as $incomingInsppectionFormData)
                                
                @endforeach
                @if  ($incomingInsppectionFormData->scope_tjf_elevator_channel == '' ) 
                {{-- gastro and colono --}}
                <form action="{{ route('withoutTjfInspectionOutgoingCreatingOperation') }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-10 py-2 px-2">
                        <div class="row px-2 py-2">
                            <h5>Scope Basic Information</h5>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Model:</label>
                                <input type="text" class="form-control" placeholder="Ex, gif-140" name="scopeModel" value="{{ $incomingInsppectionFormData->scope_model }}">
                                <input type="text" class="form-control d-none" placeholder="Ex, gif-140" name="companyId" value="{{ $incomingInsppectionFormData->company_id }}">
                                <input type="text" class="form-control d-none" placeholder="Ex, gif-140" name="incomingInspectionId" value="{{ $incomingInsppectionFormData->id }}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Outgoing Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-2023" name="scopeIncomingDate">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sr Number:</label>
                                <input type="number" class="form-control" placeholder="Ex, 123456789" name="scopeSrNumber" value="{{ $incomingInsppectionFormData->scope_sr_number }}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Receiver Name:</label>
                                <input type="text" class="form-control" placeholder="Ex, Demo Person" name="scopeSenderName" value="{{ $incomingInsppectionFormData->sender_name }}">
                            </div>
                        </div>
                        {{--  --}}
                        <br>
                        <h5>Scope Sending With</h5>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Sending With:</label>
                                <textarea name="scopeReceivedWith" id="scopeReceivedWith" cols="30" rows="6" class="form-control" placeholder="Ex, Demo Data">{{ $incomingInsppectionFormData->scope_sending_with }}</textarea>
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
                                    @if ($incomingInsppectionFormData->scope_leakage == 1)
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
                                    @if ($incomingInsppectionFormData->scope_view == 1)
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
                                    @if ($incomingInsppectionFormData->scope_lightguide == 1)
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
                                    @if ($incomingInsppectionFormData->scope_airwater == 1)
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
                                    @if ($incomingInsppectionFormData->scope_angulation == 1)
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
                                    @if ($incomingInsppectionFormData->scope_lgtube == 1)
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
                                    @if ($incomingInsppectionFormData->scope_insertiontube == 1)
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
                                    @if ($incomingInsppectionFormData->scope_biopsychannel == 1)
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
                                    @if ($incomingInsppectionFormData->scope_objectivelenz == 1)
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
                                    @if ($incomingInsppectionFormData->scope_suction == 1)
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
                                    @if ($incomingInsppectionFormData->scope_angulation_lock == 1)
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
                                    @if ($incomingInsppectionFormData->scope_freezing_buttons == 1)
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
                        {{--  --}}
                        <br>
                        <h5>Your Remarks In Details</h5>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Remarks:</label>
                                <textarea name="scopeRemarks" id="scopeRemarks" cols="30" rows="10" class="form-control" placeholder="Ex, Describe Scope Fault And Your Remarks In Details">{{ $incomingInsppectionFormData->remarks }}</textarea>
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
                                    <option value="{{ $incomingInsppectionFormData->inspectedby_id }}">{{ $incomingInsppectionFormData->employeename }}</option>
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
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
                @else
                {{-- tjf --}}
                <form action="{{ route('TjfInspectionOutgoingCreatingOperation') }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-10 py-2 px-2">
                        <div class="row px-2 py-2">
                            <h5>Scope Basic Information</h5>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Model:</label>
                                <input type="text" class="form-control" placeholder="Ex, gif-140" name="scopeModel" value="{{ $incomingInsppectionFormData->scope_model }}">
                                <input type="text" class="form-control d-none" placeholder="Ex, gif-140" name="companyId" value="{{ $incomingInsppectionFormData->company_id }}">
                                <input type="text" class="form-control d-none" placeholder="Ex, gif-140" name="incomingInspectionId" value="{{ $incomingInsppectionFormData->id }}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Outgoing Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-2023" name="scopeIncomingDate">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sr Number:</label>
                                <input type="number" class="form-control" placeholder="Ex, 123456789" name="scopeSrNumber" value="{{ $incomingInsppectionFormData->scope_sr_number }}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Receiver Name:</label>
                                <input type="text" class="form-control" placeholder="Ex, Demo Person" name="scopeSenderName" value="{{ $incomingInsppectionFormData->sender_name }}">
                            </div>
                        </div>
                        {{--  --}}
                        <br>
                        <h5>Scope Sending With</h5>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Sending With:</label>
                                <textarea name="scopeReceivedWith" id="scopeReceivedWith" cols="30" rows="6" class="form-control" placeholder="Ex, Demo Data">{{ $incomingInsppectionFormData->scope_sending_with }}</textarea>
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
                                    @if ($incomingInsppectionFormData->scope_leakage == 1)
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
                                    @if ($incomingInsppectionFormData->scope_view == 1)
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
                                    @if ($incomingInsppectionFormData->scope_lightguide == 1)
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
                                    @if ($incomingInsppectionFormData->scope_airwater == 1)
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
                                    @if ($incomingInsppectionFormData->scope_angulation == 1)
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
                                    @if ($incomingInsppectionFormData->scope_lgtube == 1)
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
                                    @if ($incomingInsppectionFormData->scope_insertiontube == 1)
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
                                    @if ($incomingInsppectionFormData->scope_biopsychannel == 1)
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
                                    @if ($incomingInsppectionFormData->scope_objectivelenz == 1)
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
                                    @if ($incomingInsppectionFormData->scope_suction == 1)
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
                                    @if ($incomingInsppectionFormData->scope_angulation_lock == 1)
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
                                    @if ($incomingInsppectionFormData->scope_freezing_buttons == 1)
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
                        <h5>Tjf Scope Related Information</h5>
                        {{--  --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Elevator Channel:</label>
                                <select name="scopeElevatorChannel" id="scopeElevatorChannel" class="form-control">
                                    @if ($incomingInsppectionFormData->scope_tjf_elevator_channel == 1)
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
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Elevator Wire:</label>
                                <select name="scopeElevatorWire" id="scopeElevatorWire" class="form-control">
                                    @if ($incomingInsppectionFormData->scope_tjf_elevator_wire == 1)
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
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Elevator Axel:</label>
                                <select name="scopeElevatorAxel" id="scopeElevatorAxel" class="form-control">
                                    @if ($incomingInsppectionFormData->scope_tjf_elevator_axel == 1)
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
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Tjf Tip Cover:</label>
                                <select name="scopeTipCover" id="scopeTipCover" class="form-control">
                                    @if ($incomingInsppectionFormData->scope_tjf_tip_cover == 1)
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
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Elevator Clinder:</label>
                                <select name="scopeElevatorClinder" id="scopeElevatorClinder" class="form-control">
                                    @if ($incomingInsppectionFormData->scope_tjf_elevator_clinder == 1)
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
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Elevator Liver:</label>
                                <select name="scopeElevatorLiver" id="scopeElevatorLiver" class="form-control">
                                    @if ($incomingInsppectionFormData->scope_tjf_liver == 1)
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
                        {{--  --}}
                        <br>
                        <h5>Your Remarks In Details</h5>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Remarks:</label>
                                <textarea name="scopeRemarks" id="scopeRemarks" cols="30" rows="10" class="form-control" placeholder="Ex, Describe Scope Fault And Your Remarks In Details">{{ $incomingInsppectionFormData->remarks }}</textarea>
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
                                    <option value="{{ $incomingInsppectionFormData->inspectedby_id }}">{{ $incomingInsppectionFormData->employeename }}</option>
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
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
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
    <script src="/custom.js"></script>
</body>
</html>