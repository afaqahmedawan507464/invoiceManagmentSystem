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
    <title>Scope Visions | Detail Service Report</title>
</head>
<body>
    <div class="container-fluid mt-2">
        
        <div class="bg-white">
            {{-- <div class="card-header"> --}}
            {{-- </div> --}}
            {{-- <div class="card-body"> --}}
                <div class="row px-2">
                    <div class="col-6">
                        <h1 class="text-start">Service Report</h1>
                    </div>
                </div>
                @if ( $selectQuotation->isEmpty() )
                    
                @else
                    @foreach ($selectQuotation as $selectQuotations)
                    @endforeach
                    <div class="col-12 px-2">
                        <div class="row">
                            <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                                <div class="d-flex justify-content-start align-items-start w-100">
                                    <b class="me-2" style="text-align: end;width:50px;">
                                        To:
                                     </b>
                                     <span style="width: 70%;">{{ $selectQuotations->client_organizationname }} <br><span>{{ $selectQuotations->client_address }}</span></span>
                                </div>
                               </div>
                           <div class="col-6 py-2 d-flex flex-column justify-content-end align-items-center">
                            <div class="d-flex justify-content-end align-items-start w-100">
                                <b class="me-2" style="text-align: end;width:100px;">
                                   Serial No:
                                </b>
                                <span style="width: 40%;">{{ $selectQuotations->id }}</span>
                            </div>
                            <div class="d-flex justify-content-end align-items-start w-100">
                                <b class="me-2" style="text-align: end;width:100px;">
                                   Date:
                                </b>
                                <span style="width: 40%;">{{ \Carbon\Carbon::parse($selectQuotations->service_date)->format('M d, Y') }}</span>
                             </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row px-3 pb-2">
                                    <div class="col-5 d-flex justify-content-start align-items-center" style="border:1px solid gray">
                                        <div class="col-6 d-flex justify-content-start align-items-center">
                                            <b class="me-2" style="text-align: end;font-size:13px;">
                                               Item Name:
                                            </b>
                                           
                                         </div>
                                         <div class="col-6 d-flex justify-content-start align-items-center">
                                            <span>{{ $selectQuotations->equiment_name }}</span>
                                         </div>
                                    </div>
                                    <div class="col-4 d-flex justify-content-start align-items-center" style="border:1px solid gray">
                                        <div class="col-6 d-flex justify-content-start align-items-center">
                                            <b class="me-2" style="text-align: end;;font-size:13px;">
                                               Model:
                                            </b>
                                            
                                         </div>
                                         <div class="col-6 d-flex justify-content-start align-items-center">
                                            <span>{{ $selectQuotations->equiment_model }}</span>
                                         </div>
                                    </div>
                                    <div class="col-3 d-flex justify-content-start align-items-center" style="border:1px solid gray">
                                        <div class="col-6 d-flex justify-content-start align-items-center">
                                            <b class="me-2" style="text-align: end;;font-size:13px;">
                                                Sr No:
                                            </b>
                                            
                                         </div>
                                         <div class="col-6 d-flex justify-content-start align-items-center">
                                            <span>{{  $selectQuotations->equiment_srNo  }}</span>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                           <th  class="py-1 mb-2" style="width:10%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Sr no</th>
                                           <th class="py-1 mb-2" style="width:70%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Question</th>
                                           <th class="py-1 mb-2" style="width:20%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @php
                                            $service_report_item_srNumber = isset($selectQuotations->service_report_item_srNumber) ? json_decode($selectQuotations->service_report_item_srNumber, true) : [];
                                            $service_report_item_question = isset($selectQuotations->service_report_item_question) ? json_decode($selectQuotations->service_report_item_question, true) : [];
                                            $service_report_item_answer = isset($selectQuotations->service_report_item_answer) ? json_decode($selectQuotations->service_report_item_answer, true) : [];
                                        @endphp
                                        @foreach ($service_report_item_srNumber as $key => $service_report_item_srNumbers)
                                        <tr>
                                            <td style="width:10%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                    <span>{{ $service_report_item_srNumbers }}</span>
                                                </div>
                                            </td>
                                            <td style="width:70%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                    <span>{{ $service_report_item_question[$key] }}</span>
                                                </div>
                                            </td>
                                            <td style="width:20%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                    <div class="row">
                                                        <div class="col-5 d-flex justify-content-center align-items-center" style="border:2px solid gray;margin:5px 0px;">
                                                            Yes
                                                        </div>
                                                        <div class="col-5 d-flex justify-content-center align-items-center mx-1" style="border:2px solid gray;margin:5px 0px;">
                                                            No
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{--  --}}
                            </div>
                            <div class="mx-3 my-2" style='border:1px solid black;width:98%;'></div>
                            <h4>Any Comments</h4>
                            <div class="col-12">
                                <p>{{ $selectQuotations->service_report_anycomment }}</p>
                            </div>
                            <div class="py-1">
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                <div class="col-6 py-2 d-flex justify-content-start align-items-center" style="border:1px solid gray">
                                    <div class="col-3 d-flex justify-content-start align-items-center">
                                        <b class="me-2" style="text-align: end;font-size:13px;">
                                           Name:
                                        </b>
                                       
                                     </div>
                                     <div class="col-9 d-flex justify-content-start align-items-center">
                                        <span>{{ $selectQuotations->service_report_name }}</span>
                                     </div>
                                </div>
                                <div class="col-6 py-2 d-flex justify-content-start align-items-center" style="border:1px solid gray">
                                    <div class="col-3 d-flex justify-content-start align-items-center">
                                        <b class="me-2" style="text-align: end;font-size:13px;">
                                           Designation:
                                        </b>
                                        
                                     </div>
                                     <div class="col-9 d-flex justify-content-start align-items-center">
                                        
                                     </div>
                                </div>
                                <div class="col-6 py-2 d-flex justify-content-start align-items-center" style="border:1px solid gray">
                                    <div class="col-3 d-flex justify-content-start align-items-center">
                                        <b class="me-2" style="text-align: end;font-size:13px;">
                                            Date:
                                        </b>
                                        
                                     </div>
                                     <div class="col-9 d-flex justify-content-start align-items-center">
                                        <span>{{ \Carbon\Carbon::parse($selectQuotations->service_report_date)->format('M d, Y') }}</span>
                                     </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            {{-- </div> --}}
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