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
    <title>Scope Visions | Detail Quotation</title>
</head>
<body>
    <div class="container-fluid mt-2">
        
        <div class="bg-white">
            {{-- <div class="card-header"> --}}
            {{-- </div> --}}
            {{-- <div class="card-body"> --}}
                @if ($selectCompanies->isEmpty())
                    
                @else
                    @foreach ($selectCompanies as $selectCompany)
                    @endforeach
                    <div class="row d-flex justify-content-center align-items-center px-2">
                        <div class="col-4 text-center">
                            <div class="d-flex align-items-center">
                            <div class="img-div" style="width:80px;height:80px;border-radius:50%">
                                <img src="{{ $selectCompany->company_logo }}" alt="" style="width:100%;height:100%;border-radius:50%">
                            </div>
                            <h3 style="text-transform: uppercase;color: #15A4FB;" class="mx-2">{{ $selectCompany->company_name }}</h3>
                            </div>
                        </div>
                        <div class="col-8 text-end">
                            <p>
                                {{ $selectCompany->company_workDetails }}
                            </p>
                        </div>
                    </div>
                @endif
                <div class="row pt-2 px-2">
                    <div class="col-6">
                        <h1 class="text-start">Quotation</h1>
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
                                    <b class="me-2" style="text-align:end;">
                                        To:
                                     </b>
                                     <p style="width: 70%;">{{ $selectQuotations->client_organizationname }} <br><span>{{ $selectQuotations->client_address }}</span></p>
                                </div>
                               </div>
                           <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex justify-content-end align-items-start w-100">
                                <b class="me-2" style="text-align: end;width:100px;">
                                   QRN:
                                </b>
                                <span style="width: 40%;">SVP-{{ $selectQuotations->id }}/{{ \Carbon\Carbon::parse($selectQuotations->quotation_date)->format('d-m-y') }}</span>
                            </div>
                            <div class="d-flex justify-content-end align-items-start w-100">
                                <b class="me-2" style="text-align: end;width:100px;">
                                   Date:
                                </b>
                                <span style="width: 40%;">{{ \Carbon\Carbon::parse($selectQuotations->quotation_date)->format('M d, Y') }}</span>
                            </div>
                            <div class="d-flex justify-content-end align-items-start w-100 d-none">
                                
                                <b class="me-2" style="text-align: end;width:100px;">
                                   Quo No:
                                </b>
                                <span style="width: 40%;">{{ $selectQuotations->quotation_number }}</span>
                            </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span style="width: 70%;font-size:14px;">{{ $selectQuotations->quotation_heading }}</span>
                            </div>
                            <div class="col-12">
                                @if (! empty ( $selectQuotations->quotation_scope_model ) )
                                <table class="w-100 py-2">
                                    <thead>
                                        <tr>
                                           <th  class="py-1 mb-2" style="width:10%;font-size: 22px;text-align:start;border-top: 2px solid black;border-bottom: 2px solid black;">Sr no</th>
                                           <th class="py-1 mb-2" style="width:70%;font-size: 22px;text-align:start;border-top: 2px solid black;border-bottom: 2px solid black;">Description</th>
                                           <th class="py-1 mb-2" style="width:20%;font-size: 22px;text-align:end;border-top: 2px solid black;border-bottom: 2px solid black;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @php
                                            $quotation_item_srNumber = isset($selectQuotations->quotation_item_srNumber) ? json_decode($selectQuotations->quotation_item_srNumber, true) : [];
                                            $quotation_scope_model = isset($selectQuotations->quotation_scope_model) ? json_decode($selectQuotations->quotation_scope_model, true) : [];
                                            $quotation_total_price = isset($selectQuotations->quotation_total_price) ? json_decode($selectQuotations->quotation_total_price, true) : [];
                                            $quotation_scope_srno = isset($selectQuotations->quotation_scope_srno) ? json_decode($selectQuotations->quotation_scope_srno, true) : [];
                                            $quotation_scope_problem = isset($selectQuotations->quotation_scope_problem) ? json_decode($selectQuotations->quotation_scope_problem, true) : [];
                                            $quotation_need_work = isset($selectQuotations->quotation_need_work) ? json_decode($selectQuotations->quotation_need_work, true) : [];
                                        @endphp
                                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                                        <tr>
                                            <td style="width:10%; display:flex;justify-content:start">
                                                <div class="px-3">
                                                    <span style="margin-top:-25px;">{{ $quotation_item_srNumbers }}</span>
                                                </div>
                                            </td>
                                            <td style="width:70%;">
                                                <div class="d-flex flex-column justify-content-center align-items-start">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <span><b>Scope Model: </b>
                                                            <span>" {{ $quotation_scope_model[$key] }} "</span>
                                                        </span>
                                                    <span class="mx-3"><b>Scope Serial No: </b>
                                                    <span> " {{ $quotation_scope_srno[$key] }} "</span></span>
                                                    </div>
                                                    
                                                    <span><b style="margin-right:20px;text-align:end">Problems: </b>
                                                        <br>
                                                        <span>{{ $quotation_scope_problem[$key] }}</span>
                                                    </span>
                                                    <span><b style="margin-right:20px;text-align:end">Work Needed: </b>
                                                        <br>
                                                        <span>{{ $quotation_need_work[$key] }}</span>
                                                    </span>
                                                    <div class="my-1"></div>
                                                </div>
                                            </td>
                                            <td class="d-flex justify-content-center align-items-start">
                                                <div class="px-3">
                                                    <span style="margin-left: 35px;">{{ $quotation_total_price[$key] }}/=</span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                @if ( empty ( $selectQuotations->quotation_item_disposible_batchNo ) )
                                <table class="w-100 py-2">
                                    <thead>
                                        <tr>
                                           <th class="py-1 mb-2" style="width:10%;font-size: 22px;text-align:start;border-top: 2px solid black;border-bottom: 2px solid black;">Sr no</th>
                                           <th class="py-1 mb-2" style="width:70%;font-size: 22px;text-align:start;border-top: 2px solid black;border-bottom: 2px solid black;">Description</th>
                                           <th class="py-1 mb-2" style="width:20%;font-size: 22px;text-align:end;border-top: 2px solid black;border-bottom: 2px solid black;">Rate/Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @php
                                            $quotation_item_srNumber = isset($selectQuotations->quotation_item_srNumber) ? json_decode($selectQuotations->quotation_item_srNumber, true) : [];
                                            $quotation_item_description = isset($selectQuotations->quotation_item_decription) ? json_decode($selectQuotations->quotation_item_decription, true) : [];
                                            $quotation_total_price = isset($selectQuotations->quotation_total_price) ? json_decode($selectQuotations->quotation_total_price, true) : [];
                                        @endphp
                                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                                        <tr>
                                            <td style="width:10%;text-align:start">
                                                <div class="d-flex justify-content-center align-items-start">
                                                    <span>{{ $quotation_item_srNumbers }}</span>
                                                </div>
                                            </td>
                                            <td style="width:70%;text-align:center">
                                                <div class="d-flex justify-content-start align-items-start">
                                                    @if(isset($quotation_item_description[$key]))
                                                    @php
                                                        $item = DB::table('stock_records')->where('id', $quotation_item_description[$key])->first();
                                                    @endphp
                                                    <span>
                                                    {{ $item ? $item->item_name : '' }}
                                                    </span>
                                                    @if (empty($item->item_srno))
                                                        
                                                    @else
                                                    <div class="d-flex justify-content-center align-items-start mx-2">
                                                   ( <span>Model: {{ $item->item_model }}</span>, <span class="mx-1">Sr No:{{$item->item_srno}}</span> )
                                                    </div>
                                                    @endif
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="width:20%;text-align:end">
                                                <div class="d-flex justify-content-center align-items-start">
                                                    @if (empty($quotation_total_price[$key]))
                                                        
                                                    @else
                                                    <span class="px-3">{{ $quotation_total_price[$key] }}/=</span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <table class="w-100 py-2">
                                    <thead class="mb-2">
                                        <tr>
                                           <th  class="py-1" style="width:5%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Srno</th>
                                           <th class="py-1" style="width:30%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Description</th>
                                           <th class="py-1" style="width:10%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Batch</th>
                                           <th class="py-1" style="width:15%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Exp Date</th>
                                           <th class="py-1" style="width:8%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">QTy</th>
                                           <th class="py-1" style="width:12%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Price</th>
                                           <th class="py-1" style="width:20%;font-size: 16px;text-align:center;border-top: 2px solid black;border-bottom: 2px solid black;">Total</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $quotation_item_srNumber = isset($selectQuotations->quotation_item_srNumber) ? json_decode($selectQuotations->quotation_item_srNumber, true) : [];
                                    $quotation_item_description = isset($selectQuotations->item_id) ? json_decode($selectQuotations->item_id, true) : [];
                                    $quotation_total_price = isset($selectQuotations->quotation_total_price) ? json_decode($selectQuotations->quotation_total_price, true) : [];
                                    $quotation_item_disposible_batchNo = isset($selectQuotations->quotation_item_disposible_batchNo) ? json_decode($selectQuotations->quotation_item_disposible_batchNo, true) : [];
                                    $quotation_item_disposible_expDate = isset($selectQuotations->quotation_item_disposible_expDate) ? json_decode($selectQuotations->quotation_item_disposible_expDate, true) : [];
                                    $quotation_item_disposible_qtv = isset($selectQuotations->quotation_item_disposible_qtv) ? json_decode($selectQuotations->quotation_item_disposible_qtv, true) : [];
                                    $quotation_item_disposible_pricePerUnit = isset($selectQuotations->quotation_item_disposible_pricePerUnit) ? json_decode($selectQuotations->quotation_item_disposible_pricePerUnit, true) : [];
                                    @endphp
                                    <tbody>
                                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                                        <tr>
                                            <td style="width: 5%;">
                                            <div class="d-flex justify-content-center align-items-start">
                                                <span>{{ $quotation_item_srNumbers }}</span>
                                            </div>
                                            </td>
                                            <td style="width: 30%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                {{-- <span>{{ $quotation_item_description[$key] }}</span> --}}
                                                @if(isset($quotation_item_description[$key]))
                                                    @php
                                                        $item = DB::table('stock_records')->where('id', $quotation_item_description[$key])->first();
                                                    @endphp
                                                    <span>
                                                    {{ $item ? $item->item_name : '' }}
                                                    </span>
                                                @endif
                                                
                                            </div>
                                            </td>
                                            <td style="width: 10%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                <span>{{ $quotation_item_disposible_batchNo[$key] }}</span>
                                            </div>
                                            </td>
                                            <td style="width: 15%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                <span >{{ $quotation_item_disposible_expDate[$key] }}</span>
                                            </div>
                                            </td>
                                            <td style="width: 8%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                <span>{{ $quotation_item_disposible_qtv[$key] }}</span>
                                            </div>
                                            </td>
                                            <td style="width: 12%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                <span>{{ $quotation_item_disposible_pricePerUnit[$key] }}</span>
                                            </div>
                                            </td>
                                            <td style="width: 20%;">
                                                <div class="d-flex justify-content-center align-items-start">
                                                <span class="px-3">{{ $quotation_total_price[$key] }}/=</span>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                                @endif
                                @if ( empty ( $selectQuotations->quotation_gsttext ) )
                                    
                                @else
                                <div class="total-amount-div mt-2" style="display: flex;justify-content: end;align-items: center;width: 100%;padding: 5px 10px;border-top: 2px solid black;border-bottom: 2px solid black;">
                                    <div class="p-total-lable" style="width: 60% !important;font-family: 'Inter', sans-serif;font-size: 16px;text-align: end; padding: 0px 10px;">
                                       <b class="me-2">GST Tex:</b>
                                    </div>
                                    <div class="p-total-lable" style="font-family: 'Inter', sans-serif;font-size: 16px;text-align: start; padding: 0px 10px;">
                                        <b class="me-2">{{ $selectQuotations->quotation_gsttext }}/=</b>
                                    </div>
                                </div>
                                @endif
                                @php
                                $totalAmounts = 0;
                                $totalAmount = 0;
                                $quotation_total_price = isset($selectQuotations->quotation_total_price) ? json_decode($selectQuotations->quotation_total_price, true) : [];

                                foreach ($quotation_total_price as $key => $quotation_total_prices) {
                                    $totalAmounts += $quotation_total_prices;
                                }
                                if ( empty ( $selectQuotations->quotation_gsttext ) ) {
                                    $totalAmount =  0 +  $totalAmounts ;
                                } else {
                                    $totalAmount =  $selectQuotations->quotation_gsttext  +  $totalAmounts ;
                                }
                                @endphp
                                <div class="total-amount-div" style="display: flex;justify-content: end;align-items: center;width: 100%;padding: 5px 10px;border-bottom: 2px solid black;border-top: 2px solid black;">
                                    <div class="p-total-lable" style="width: 40% !important;font-family: 'Inter', sans-serif;font-size: 16px;text-align: end;">
                                       <b class="me-2">Total Amount:</b>
                                    </div>
                                    <div class="p-total-lable" style="font-family: 'Inter', sans-serif;font-size: 16px;text-align: start; padding: 0px 10px;">
                                        <b class="me-2">{{ $totalAmount }}/=</b>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 py-2 px-2">
                                               <div class="d-flex justify-content-start align-items-start w-100">
                                            <b class="me-2">Total Amount In Word:</b>
                                            <p>{{ NumConvert::word($totalAmount) }} only /=</p> 
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                $quotation_termAndConditions = isset($selectQuotations->quotation_termAndConditions) ? json_decode($selectQuotations->quotation_termAndConditions, true) : [];
                                 @endphp
                                {{--  --}}
                                <div class="row mt-1">
                                    <div class="col-8 d-flex flex-column">
                                        <h5>Term And Conditions</h5>
                                        <div class="d-flex flex-column">
                                            @foreach ($quotation_termAndConditions as $quotation_termAndCondition)
                                            {{--  --}}
                                            <span style="font-size: 12px;width: 100%">{{ $quotation_termAndCondition }}</span>
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                    <div class="col-4">
                                        <h5>Best Regard,</h5>
                                        <div class="pt-5" style="border-bottom:2px solid black"></div>
                                        <span class="pt-3">Chief Executive Officer</span>
                                        @if ($selectCompanies->isEmpty())
                                            
                                        @else
                                        @foreach ($selectCompanies as $selectCompany)  
                                        @endforeach
                                        <p>
                                            {{ $selectCompany->company_ownername }}
                                            <br>
                                            <span>{{ $selectCompany->company_contactnumber }}</span>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($selectCompanies->isEmpty())
                    
                @else
                    @foreach ($selectCompanies as $selectCompany)
                    @endforeach
                   <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 text-center">
                       <i class="fas fa-map"></i> <span class="mx-2">{{ $selectCompany->company_address }}
                       <i class="fas fa-phone mx-2"></i><span>{{ $selectCompany->company_contactnumber }}</span><span class="mx-3">{{ $selectCompany->company_phonenumber }}</span></span>
                            <i class="fas fa-envelope ms-2 me-2"></i><span>{{ $selectCompany->company_emailaddress }}</span>
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