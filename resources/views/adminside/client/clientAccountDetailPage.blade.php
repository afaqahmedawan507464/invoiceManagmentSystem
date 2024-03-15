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
    <title>Scope Visions | Client Account Detail</title>
</head>
<body>
    <div class="container-fluid mt-2">
        
    <div class="bg-white py-2">
        @if ($selectCompanies->isEmpty())  
        @else
            @foreach ($selectCompanies as $selectCompany)
            @endforeach
            <div class="row d-flex justify-content-center align-items-center px-2">
                <div class="col-12 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center py-2">
                    <h3 style="text-transform: uppercase;color: #15A4FB;" class="mx-2 text-center">{{ $selectCompany->company_name }}</h3>
                    <span style="text-transform:capitalize;" class="mx-2 text-center">{{ $selectCompany->company_address }}</span>
                    </div>
                </div>
            </div>
        @endif
        {{--  --}}
        <div class="row pt-2 px-2">
            <div class="col-12">
                <h3 class="text-center">Account History</h3>
            </div>
            {{--  --}}
            <div class="col-12">
                @if ( $selectClientAccountDetails->isEmpty() )
                    <h4 class="text-center py-2">Not Data Founded</h4>
                @else
                @foreach ($selectClientAccountDetails as $selectClientAccountDetailss)
                    
                @endforeach
                <div class="row">
                    <div class="col-6 py-2">
                        <span><b>Account Name:</b><span class="mx-2" style="text-transform: uppercase">" {{ $selectClientAccountDetailss->client_name }} "</span></span>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center py-2">
                        <span><b>Opening Bal:</b><span class="mx-2">" {{ $selectClientAccountDetailss->Previous_amount }} /= "</span></span>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                @if ( $selectClientAccountDetails->isEmpty() )
                    
                @else
                @foreach ($selectClientAccountDetails as $selectClientAccountDetailss)
                @if (empty($selectClientAccountDetailss->invoice_id) && empty($selectClientAccountDetailss->invoice_item_srNumber) && empty($selectClientAccountDetailss->invoice_total_price))
                    <h5>Payment Received</h5>
                    <div class="col-12 mb-1 d-flex justify-content-center align-items-center">
                        <div class="py-2" style="width:20%;text-align:center;border:1px solid black;font-size:12px;">Date: <span class="mx-2">{{ \Carbon\Carbon::parse($selectClientAccountDetailss->invoice_date)->format('M d, Y') }}</span></div>
                        <div class="py-2" style="width:20%;text-align:center;border:1px solid black;font-size:12px;">Paid Person: <span class="mx-1">{{ $selectClientAccountDetailss->client_name }}</span></div>
                        <div class="py-2" style="width:60%;text-align:center;border:1px solid black;font-size:12px;">Note: <span class="mx-1">{{ $selectClientAccountDetailss->Notes }}</span></div>
                    </div>
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="py-2" style="width:25%;text-align:center;border:1px solid black">Previous</th>
                                <th class="py-2" style="width:25%;text-align:center;border:1px solid black">Received</th>
                                <th class="py-2" style="width:25%;text-align:center;border:1px solid black">Pay Status</th>
                                <th class="py-2" style="width:25%;text-align:center;border:1px solid black">Balance</th>
                            </tr>
                        </thead>
                         <tbody> 
                            @php
                                $remainingAmount = $selectClientAccountDetailss->Previous_amount;
                                $receivedAmount = $selectClientAccountDetailss->invoice_grant_total_amount;
                                $lastPrevious = $remainingAmount + $receivedAmount;
                            @endphp
                            <tr>
                                <td style="width:25%;text-align:center;border:1px solid black">
                                    {{ $lastPrevious }}
                                </td>
                                <td style="width:25%;text-align:center;border:1px solid black">
                                    {{ $preAmount = $selectClientAccountDetailss->invoice_grant_total_amount; }}
                                </td>
                                @if ( $selectClientAccountDetailss->payment_type == '0' )
                                <td style="width:25%;text-align:center;border:1px solid black">Pending</td>
                                @else
                                <td style="width:25%;text-align:center;border:1px solid black">Received</td>
                                @endif
                                <td style="width:25%;text-align:center;border:1px solid black">
                                    {{ $preAmount = $selectClientAccountDetailss->Previous_amount; }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @else
                <div class="col-12 mb-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black;font-size:12px;">Date: <span class="mx-2">{{ \Carbon\Carbon::parse($selectClientAccountDetailss->invoice_date)->format('M d, Y') }}</span></div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black;font-size:12px;">Voucher: <span class="mx-1">SVP-{{ $selectClientAccountDetailss->id }}/{{ \Carbon\Carbon::parse($selectClientAccountDetailss->invoice_date)->format('y') }}</span></div>
                    <div class="py-2" style="width:30%;text-align:center;border:1px solid black;font-size:12px;">Invoice Ref: <span class="mx-1">{{ $selectClientAccountDetailss->client_name }}</span></div>
                    <div class="py-2" style="width:30%;text-align:center;border:1px solid black;font-size:12px;">Note: <span class="mx-1">{{ $selectClientAccountDetailss->Notes }}</span></div>
                </div>
                @if (! empty ( $selectClientAccountDetailss->invoice_scope_model ) )
                <h5 class="text-start">For Repairing System</h5>
                {{--  --}}
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="py-2" style="width:60%;text-align:center;border:1px solid black">Details</th>
                            <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Pay Status</th>
                            <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Balance</th>
                        </tr>
                    </thead>
                     <tbody>
                        @php
                            $quotation_item_srNumber = isset($selectClientAccountDetailss->invoice_item_srNumber) ? json_decode($selectClientAccountDetailss->invoice_item_srNumber, true) : [];
                            $quotation_scope_model = isset($selectClientAccountDetailss->invoice_scope_model) ? json_decode($selectClientAccountDetailss->invoice_scope_model, true) : [];
                            $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                            $quotation_scope_srno = isset($selectClientAccountDetailss->invoice_scope_srno) ? json_decode($selectClientAccountDetailss->invoice_scope_srno, true) : [];
                            $quotation_scope_problem = isset($selectClientAccountDetailss->invoice_scope_problem) ? json_decode($selectClientAccountDetailss->invoice_scope_problem, true) : [];
                            $quotation_need_work = isset($selectClientAccountDetailss->invoice_need_work) ? json_decode($selectClientAccountDetailss->invoice_need_work, true) : [];
                        @endphp
                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                            
                        <tr>
                            <td style="width:60%;text-align:center;border:1px solid black">
                                <div class="d-flex flex-column justify-content-center align-items-start px-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span><b>Scope Model: </b>
                                            <span>" {{ $quotation_scope_model[$key] }} "</span>
                                        </span>
                                    <span class="mx-3"><b>Scope Serial No: </b>
                                    <span> " {{ $quotation_scope_srno[$key] }} "</span></span>
                                    </div>
                                    <span><b style="margin-right:20px;text-align:end">Work Done: </b>
                                        <br>
                                        <span>{{ $quotation_need_work[$key] }}</span>
                                    </span>
                                    <div class="my-1"></div>
                                </div>
                            </td>
                            @if ( $selectClientAccountDetailss->payment_type == '0' )
                            <td style="width:20%;text-align:center;border:1px solid black">Pending</td>
                            @else
                            <td style="width:20%;text-align:center;border:1px solid black">Received</td>
                            @endif
                            <td style="width:20%;text-align:center;border:1px solid black">
                               {{ $quotation_total_price[$key] }}
                            </td>
                        </tr>
                        
                        @endforeach
                        @php
                            $totalAmounts = 0;
                            $totalAmount = 0;
                            $grandTotalAmount = 0;
                            $price = 0;
                            $preAmount = $selectClientAccountDetailss->Previous_amount;
                            // $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                            // foreach ($quotation_total_price as $key => $invoice_total_prices) {
                            //     $totalAmounts += $invoice_total_prices;
                            // }
                            $totalAmounts = $selectClientAccountDetailss->invoice_grant_total_amount;
                            if ( $selectClientAccountDetailss->payment_type == '0' ) {
                                 $price = $totalAmounts;
                                 $grandTotalAmount = $preAmount + $price;
                             } else {
                                 $price = 0;
                                 $grandTotalAmount = $preAmount + $price;
                             }
                        @endphp
                        
                    </tbody>
                </table>
                {{--  --}}
                @if (! empty ( $selectClientAccountDetailss->invoice_gsttext ) )
                <div class="col-12 my-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:60%;text-align:center;border:1px solid black">Total ( Included Tex : {{ $selectClientAccountDetailss->invoice_gsttext }} ) </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $price }} /=</span>
                    </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $grandTotalAmount }} /=</span>
                    </div>
                </div>
                @else
                <div class="col-12 my-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:60%;text-align:center;border:1px solid black">Total</div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $price }} /=</span>
                    </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $grandTotalAmount }} /=</span>
                    </div>
                </div>
                @endif
                {{--  --}}
                @else
                @if ( empty ( $selectClientAccountDetailss->invoice_item_disposible_batchNo ) )
                <h5 class="text-start">For system</h5>
                {{--  --}}
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="py-2" style="width:60%;text-align:center;border:1px solid black">Description</th>
                            <th class="py-2" style="width:10%;text-align:center;border:1px solid black">Pay Status</th>
                            <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Balance</th>
                        </tr>
                    </thead>
                     <tbody>
                        @php
                           $quotation_item_srNumber = isset($selectClientAccountDetailss->invoice_item_srNumber) ? json_decode($selectClientAccountDetailss->invoice_item_srNumber, true) : [];
                           $quotation_item_description = isset($selectClientAccountDetailss->invoice_item_decription) ? json_decode($selectClientAccountDetailss->invoice_item_decription, true) : [];
                           $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                        @endphp 
                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                        
                        <tr>
                                <td style="width:60%;text-align:center;border:1px solid black">
                                    @if(isset($quotation_item_description[$key]))
                                            @php
                                                $item = DB::table('stock_records')->where('id', $quotation_item_description[$key])->first();
                                            @endphp
                                            <span>
                                            {{ $item ? $item->item_name : '' }}
                                            </span>
                                        @endif
                                </td>
                                @if ( $selectClientAccountDetailss->payment_type == '0' )
                                <td style="width:20%;text-align:center;border:1px solid black">Pending</td>
                                @else
                                <td style="width:20%;text-align:center;border:1px solid black">Received</td>
                                @endif
                                <td style="width:20%;text-align:center;border:1px solid black">
                                    <div class="d-flex justify-content-center align-items-start">
                                        <span>{{ $quotation_total_price[$key] }}</span>
                                    </div>
                                </td>
                        </tr>

                        @endforeach
                        @php
                            $totalAmounts = 0;
                            $totalAmount = 0;
                            $grandTotalAmount = 0;
                            $price = 0;
                            $preAmount = $selectClientAccountDetailss->Previous_amount;
                            // $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                            // foreach ($quotation_total_price as $key => $invoice_total_prices) {
                            //     $totalAmounts += $invoice_total_prices;
                            // }
                            $totalAmounts = $selectClientAccountDetailss->invoice_grant_total_amount;
                            if ( $selectClientAccountDetailss->payment_type == '0' ) {
                                 $price = $totalAmounts;
                                 $grandTotalAmount = $preAmount + $price;
                             } else {
                                 $price = 0;
                                 $grandTotalAmount = $preAmount + $price;
                             }
                        @endphp
                    </tbody>
                </table>
                {{--  --}}
                @if (! empty ( $selectClientAccountDetailss->invoice_gsttext ) )
                <div class="col-12 my-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:60%;text-align:center;border:1px solid black">Total ( Included Tex : {{ $selectClientAccountDetailss->invoice_gsttext }} )</div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $price }} /=</span>
                    </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                    <span>{{ $grandTotalAmount }}</span>
                    </div>
                </div>
                @else
                <div class="col-12 my-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:60%;text-align:center;border:1px solid black">Total</div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $price }} /=</span>
                    </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                    <span>{{ $grandTotalAmount }}</span>
                    </div>
                </div>
                @endif
                {{--  --}}
                @else
                <h5 class="text-start">For Disposible Item</h5>
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="py-2" style="width:40%;text-align:center;border:1px solid black">Description</th>
                            <th class="py-2" style="width:10%;text-align:center;border:1px solid black">Qtv</th>
                            <th class="py-2" style="width:10%;text-align:center;border:1px solid black">Pay Status</th>
                            <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Price</th>
                            <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Balance</th>
                        </tr>
                    </thead>
                     <tbody>
                        @php
                            $quotation_item_srNumber = isset($selectClientAccountDetailss->invoice_item_srNumber) ? json_decode($selectClientAccountDetailss->invoice_item_srNumber, true) : [];
                            $quotation_item_description = isset($selectClientAccountDetailss->item_id) ? json_decode($selectClientAccountDetailss->item_id, true) : [];
                            $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                            $quotation_item_disposible_batchNo = isset($selectClientAccountDetailss->invoice_item_disposible_batchNo) ? json_decode($selectClientAccountDetailss->invoice_item_disposible_batchNo, true) : [];
                            $quotation_item_disposible_expDate = isset($selectClientAccountDetailss->invoice_item_disposible_expDate) ? json_decode($selectClientAccountDetailss->invoice_item_disposible_expDate, true) : [];
                            $quotation_item_disposible_qtv = isset($selectClientAccountDetailss->invoice_item_disposible_qtv) ? json_decode($selectClientAccountDetailss->invoice_item_disposible_qtv, true) : [];
                            $quotation_item_disposible_pricePerUnit = isset($selectClientAccountDetailss->invoice_item_disposible_pricePerUnit) ? json_decode($selectClientAccountDetailss->invoice_item_disposible_pricePerUnit, true) : [];
                            $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                        @endphp
                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                            <tr>
                                <td style="width:40%;text-align:center;border:1px solid black">
                                    <div class="d-flex justify-content-center align-items-start">
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
                                <td style="width:10%;text-align:center;border:1px solid black">
                                {{ $quotation_item_disposible_qtv[$key] }}
                                </td>
                                @if ( $selectClientAccountDetailss->payment_type == '0' )
                                <td style="width:10%;text-align:center;border:1px solid black">Pending</td>
                                @else
                                <td style="width:10%;text-align:center;border:1px solid black">Received</td>
                                @endif
                                <td style="width:20%;text-align:center;border:1px solid black">
                                    {{ $quotation_item_disposible_pricePerUnit[$key] }}
                                </td>
                                <td style="width:20%;text-align:center;border:1px solid black">
                                    {{ $quotation_total_price[$key] }}/=
                                </td>
                            </tr>
                        
                        @endforeach
                        @php 
                        $totalQtv = 0;
                        $price = 0;
                        $grandTotalAmount = 0;
                        $amount = 0;
                        $preAmount = $selectClientAccountDetailss->Previous_amount;
                            $totalAmounts = 0;
                            $quotation_item_disposible_pricePerUnit = isset($selectClientAccountDetailss->invoice_item_disposible_pricePerUnit) ? json_decode($selectClientAccountDetailss->invoice_item_disposible_pricePerUnit, true) : [];
                            foreach ($quotation_item_disposible_pricePerUnit as $key => $invoice_total_prices) {
                                $amount += $invoice_total_prices;
                            }
                            $quotation_item_disposible_qtv = isset($selectClientAccountDetailss->invoice_item_disposible_qtv) ? json_decode($selectClientAccountDetailss->invoice_item_disposible_qtv, true) : [];
                            foreach ($quotation_item_disposible_qtv as $key => $invoice_total_prices) {
                                $totalQtv += $invoice_total_prices;
                            }
                            $totalAmounts = $selectClientAccountDetailss->invoice_grant_total_amount;
                            // $quotation_total_price = isset($selectClientAccountDetailss->invoice_total_price) ? json_decode($selectClientAccountDetailss->invoice_total_price, true) : [];
                            // foreach ($quotation_total_price as $key => $invoice_total_prices) {
                            //         $totalAmounts += $invoice_total_prices;
                            // }
                            if ( $selectClientAccountDetailss->payment_type == '0' ) {
                                $price = $totalAmounts;
                                $grandTotalAmount = $preAmount + $price;
                            } else {
                                $price = 0;
                                $grandTotalAmount = $preAmount + $price;
                            }
                        @endphp
                    </tbody>
                </table>
                @if (! empty ( $selectClientAccountDetailss->invoice_gsttext ) )
                <div class="col-12 my-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:40%;text-align:center;border:1px solid black">Total ( Included Tex : {{ $selectClientAccountDetailss->invoice_gsttext }} )</div>
                    <div class="py-2" style="width:10%;text-align:center;border:1px solid black">
                    {{ $totalQtv }}
                    </div>
                    <div class="py-2" style="width:10%;text-align:center;border:1px solid black">
                        <span>{{ $price }} /=</span>
                    </div>
                    <div class="py-2 " style="width:20%;text-align:center;border:1px solid black">
                        {{ $amount }}
                    </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $grandTotalAmount }} /=</span>
                    </div>
                </div>
                @else
                <div class="col-12 my-1 d-flex justify-content-center align-items-center">
                    <div class="py-2" style="width:40%;text-align:center;border:1px solid black">Document Total</div>
                    <div class="py-2" style="width:10%;text-align:center;border:1px solid black">
                    {{ $totalQtv }}
                    </div>
                    <div class="py-2" style="width:10%;text-align:center;border:1px solid black">
                        <span>{{ $price }} /=</span>
                    </div>
                    <div class="py-2 " style="width:20%;text-align:center;border:1px solid black">
                        {{ $amount }}
                    </div>
                    <div class="py-2" style="width:20%;text-align:center;border:1px solid black">
                        <span>{{ $grandTotalAmount }} /=</span>
                    </div>
                </div>
                @endif
                @endif
                @endif
                @endif
                @endforeach
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