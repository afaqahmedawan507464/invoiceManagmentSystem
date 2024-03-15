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
    <title>Scope Visions | Detail Bank Expenses</title>
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
        <div class="col-12 print">
            <form action="{{ route('getDataForMonthdetailExpensesBanksPage') }}" method="post" class="d-flex justify-content-end align-items-center">
                @csrf
                <div>
                  <select class="form-control" name="searchByYearMonth">
                      <option value="">Select Month And Year</option>
                      
                    @php
                        $prevMonth = '';
                    @endphp
                    @if(isset($bankDetails))
                        @foreach ($bankDetails as $selectAlls)
                            @php
                                $currentMonth = \Carbon\Carbon::parse($selectAlls->payment_date)->format('M,Y');
                            @endphp
                            @if($currentMonth != $prevMonth)
                                <option value="{{ $selectAlls->payment_date }}">{{ $currentMonth }}</option>
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
        {{--  --}}
        <div class="row pt-1 px-2 printVisible">
            <div class="col-6 py-1">
                <h3 class="text-start">Bank Payment Record</h3>
            </div>
            @if ($selectBankExpenses->isEmpty())
            @else
            @foreach ($selectBankExpenses as $selectBankExpense)
            @endforeach
            <div class="col-6 py-1 d-flex justify-content-end align-item-center">
                <h3 class="text-end">Month Name: <span class="mx-2">{{ \Carbon\Carbon::parse($selectBankExpense->payment_date)->format('M, Y')}}</span></h3>
            </div>
            @endif
            {{--  --}}
            <div class="col-12">
                @if ($selectBankExpenses->isEmpty())
                <h4 class="text-center py-2">Not Data Founded</h4>
                @else
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="p-2" style="width:10%;text-align:center;border:1px solid black">Date</th>
                            <th class="p-2" style="width:15%;text-align:center;border:1px solid black">Name</th>
                            <th class="p-2" style="width:10%;text-align:center;border:1px solid black">Type</th>
                            <th class="p-2" style="width:10%;text-align:center;border:1px solid black">Method</th>
                            <th class="p-2" style="width:15%;text-align:center;border:1px solid black">Bank Name</th>
                            <th class="p-2" style="width:10%;text-align:center;border:1px solid black">Account No</th>
                            <th class="p-2" style="width:10%;text-align:center;border:1px solid black">Slip No</th>
                            <th class="p-2" style="width:10%;text-align:center;border:1px solid black">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($selectBankExpenses as $selectBankExpense)
                    <tr>
                        <td class="py-1" style="width:10%;text-align:center;border:1px solid black;font-size:12px;">{{ \Carbon\Carbon::parse($selectBankExpense->payment_date)->format('M d, Y')}}</td>
                        <td class="py-1" style="width:20%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                                $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            @endphp
                            @foreach ($name as $key => $names)
                                <span>{{ $names }}</span>
                                <br>
                            @endforeach
                        </td>
                        <td class="py-1" style="width:10%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            $payment_category_type = isset($selectBankExpense->payment_category_type) ? json_decode($selectBankExpense->payment_category_type, true) : [];
                        @endphp
                        @foreach ($name as $key => $names)
                        @if ($payment_category_type[$key] == '1')
                        <span>Send</span>
                        <br>
                        @else
                        <span>Received</span>
                        <br>
                        @endif
                        @endforeach
                        </td>
                        <td class="py-1" style="width:10%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            $payment_method = isset($selectBankExpense->payment_method) ? json_decode($selectBankExpense->payment_method, true) : [];
                        @endphp
                        @foreach ($name as $key => $names)
                        @if ($payment_method[$key] == '1')
                        <span>Cash</span>
                        <br>
                        @elseif($payment_method[$key] == '2')
                        <span>Online</span>
                        <br>
                        @else       
                        <span>Other</span>
                        <br>                     
                        @endif
                        @endforeach
                        </td>
                        <td class="py-1" style="width:15%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            $payment_bank_name = isset($selectBankExpense->bank_name) ? json_decode($selectBankExpense->bank_name, true) : [];
                        @endphp
                        @foreach ($name as $key => $names)
                            <span>{{ $payment_bank_name[$key] }}</span>
                            <br>
                        @endforeach
                        </td>
                        <td class="py-1" style="width:10%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            $payment_account_no = isset($selectBankExpense->bank_account_number) ? json_decode($selectBankExpense->bank_account_number, true) : [];
                        @endphp
                        @foreach ($name as $key => $names)
                            <span>{{ $payment_account_no[$key] }}</span>
                            <br>
                        @endforeach
                        </td>
                        <td class="py-1" style="width:10%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            $slip_number = isset($selectBankExpense->slip_number) ? json_decode($selectBankExpense->slip_number, true) : [];
                        @endphp
                        @foreach ($name as $key => $names)
                            <span>{{ $slip_number[$key] }}</span>
                            <br>
                        @endforeach
                        </td>
                        <td class="py-1" style="width:10%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $name = isset($selectBankExpense->name) ? json_decode($selectBankExpense->name, true) : [];
                            $payment_amount = isset($selectBankExpense->payment_amount) ? json_decode($selectBankExpense->payment_amount, true) : [];
                        @endphp
                        @foreach ($name as $key => $names)
                            <span>{{ $payment_amount[$key] }}</span>
                            <br>
                        @endforeach
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>  
                @endif                     
            </div>
            @if ($selectBankExpenses->isEmpty())
            @else
            <div class="row pt-3">
                @php
                     
                    $totalSendAmount = 0;
                    $totalReceivedAmount = 0;
                    $totalRemainingAmount = 0;
                    $totalSendAmountz = 0;
                    $totalReceivedAmountz = 0;
                    foreach ($selectBankExpenses as $key => $value) {
                        $totalSendAmount += $value->total_send_amount;
                        $totalReceivedAmount += $value->total_received_amount;
                    }
                    // $remainingData = $select->last();
                    // $totalRemainingAmount = $remainingData->remaining_amount;
                    // 
                    // last month remaining amount
                    $lastMonthAmountRemaining = $totalReceivedAmount - $totalSendAmount;
                    
                @endphp
                <div class="col-6">
                    <div class="d-flex justify-content-center align-items-center py-1">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sending Amount:</label>
                        <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value=" {{ $totalSendAmount }}/=">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-center align-items-center py-1">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Received Amount:</label>
                        <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value=" {{ $totalReceivedAmount }}/=">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-center align-items-center py-1">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Remain Amount:</label>
                        <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $lastMonthAmountRemaining }}/=">
                    </div>
                </div>
            </div>
            @endif
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