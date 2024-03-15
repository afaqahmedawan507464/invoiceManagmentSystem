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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/themes/public/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/themes/public/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/themes/public/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/themes/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <title>Scope Visions | Detail Outgoing Inspection</title>
</head>

<body>
    <div class="container-fluid mt-2">

        @if (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show px-4 d-flex justify-content-center flex-column"
                role="alert">
                <strong>Error</strong> {{ Session::get('error_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show px-4 d-flex justify-content-center flex-column"
                role="alert">
                <strong>Success:</strong> {{ Session::get('success_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show px-4 d-flex justify-content-center flex-column"
                role="alert">
                @foreach ($errors->all() as $item)
                    <li style="list-style: none">{{ $item }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="bg-light px-3 py-2">
            @foreach ($selectCompany as $selectCompanyss)
            @endforeach
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-6 text-center">
                    <div class="d-flex align-items-center">
                        <div class="img-div mx-3" style="height: 100px;width: 100px;border-radius:50%;">
                            <img src="{{ $selectCompanyss->company_logo }}" alt=""
                                style="height: 100%;width: 100%;border-radius:50%;">
                        </div>
                        <h3 style="text-transform: uppercase;color: #15A4FB;">{{ $selectCompanyss->company_name }}</h3>
                    </div>
                </div>
                @foreach ($selectIncomingReportInspection as $selectIncomingReportInspections)
                @endforeach
                <div class="col-6 text-end">
                    <p>
                        Serial Number : {{ $selectIncomingReportInspections->id }}
                    </p>
                </div>
            </div>
            <div class="row mt-3">
                <h3 style="text-transform:capitalize;text-align:center">Outgoing Inspection Report</h3>
                <div class="col-3 py-2" style="border:0.5px solid lightgray">
                    <label class="my-1" style="margin-top: 5px;">Scope Model:</label>
                    <input type="text" class="form-control" placeholder="enter data"
                        style="width:100%;font-size:10px; !important;"
                        value="{{ $selectIncomingReportInspections->scope_model }}" disabled>
                </div>
                <div class="col-3 py-2" style="border:0.5px solid lightgray">
                    <label class="my-1" style="margin-top: 5px;">Outgoing Date:</label>
                    <input type="text" class="form-control" placeholder="enter data"
                        style="width:100%;font-size:10px; !important;"
                        value="{{ $selectIncomingReportInspections->scope_incoming_date }}" disabled>
                </div>
                <div class="col-3 py-2" style="border:0.5px solid lightgray">
                    <label class="my-1" style="margin-top: 5px;">Sr Number:</label>
                    {{-- <input type="number" class="form-control" placeholder="enter data" style="width:100%;"> --}}
                    <input type="text" class="form-control" placeholder="enter data"
                        style="width:100%;font-size:10px; !important;"
                        value="{{ $selectIncomingReportInspections->scope_sr_number }}" disabled>
                </div>
                <div class="col-3 py-2" style="border:0.5px solid lightgray">
                    <label class="my-1" style="margin-top: 5px;">Receiver Name:</label>
                    {{-- <input type="text" class="form-control" placeholder="enter data" style="width:100%;"> --}}
                    <input type="text" class="form-control" placeholder="enter data"
                        style="width:100%;font-size:10px; !important;"
                        value="{{ $selectIncomingReportInspections->sender_name }}" disabled>
                </div>
                <div class="col-12 py-2" style="border:0.5px solid lightgray">
                    <label class="my-1" style="margin-top: 5px;">Scope Sending With:</label>
                    {{-- <textarea name="" id="" cols="30" rows="4" class="form-control" disabled>{{ $selectIncomingReportInspections->scope_sending_with }}</textarea> --}}
                    <p style="font-size: 12px">{{ $selectIncomingReportInspections->scope_sending_with }}</p>
                </div>
            </div>
            <!--  -->
            <h5 class="text-center mt-2">After Repaired Outgoing Inspection Report</h5>
            <!--  -->
            <div class="row">

                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Leakage:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_leakage == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">View:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_view == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Light Guide:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_lightguide == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Air/Water:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_airwater == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Angulations:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_angulation == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">LG Tube:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_lgtube == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <!--  -->
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Insertion Tube:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_insertiontube == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:10px;">Biopsy Channel:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_biopsychannel == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Objective Lenz:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_objectivelenz == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Suction:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_suction == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Lock:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_angulation_lock == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
                <div class="col-2 p-2" style="border:0.5px solid lightgray">
                    <label class="my-2" style="margin-top: 5px;font-size:12px;">Freeze Buttons:</label>
                    <select name="" id="" class="form-control" disabled>
                        @if ($selectIncomingReportInspections->scope_freezing_buttons == 1)
                            <option value="">Ok</option>
                        @else
                            <option value="">Not Ok</option>
                        @endif
                    </select>
                </div>
            </div>
            <h5 class="text-center mt-2">Describe Scope Fault And Your Remarks In Details</h5>
            <div class="row">
                <div class="col-12 py-2">
                    <label class="my-1" style="margin-top: 5px;">Remarks:</label>
                    {{-- <textarea class="form-control" name="" id="" cols="30" rows="8"></textarea> --}}
                    <p style="font-size: 12px">{{ $selectIncomingReportInspections->remarks }}</p>
                </div>
                <div class="col-6">
                    <div class="d-flex py-2">
                        <label class="my-1" style="margin-top: 5px;width: 150px;">Inspected By:</label>
                        <input type="text" class="form-control" placeholder="enter data" style="width:60%;"
                            value="{{ $selectIncomingReportInspections->employeename }}" disabled>
                    </div>
                    <div class="d-flex py-2">
                        <label class="my-1" style="margin-top: 5px;width: 150px;">Signature:</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="2" style="width:60%;"></textarea>
                    </div>
                </div>
                <div class="col-6 p-2">
                    <div class="p-5" style="border:0.5px solid lightgray"></div>
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
    <script src="/custom.js"></script>
</body>

</html>
