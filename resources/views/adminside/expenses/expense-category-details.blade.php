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
    <title>Expense Details</title>
</head>
<body>
    <div class="container-fluid mt-2">
        
    <div class="bg-white py-2">

        {{--  --}}
        <div class="row pt-1 px-2">
            <div class="col-6 py-1">
                <h3 class="text-start">Expense Details</h3>
            </div>
            @if ($selectExpenses->isEmpty())
            @else
            @foreach ($selectExpenses as $selectExpense)
            @endforeach
            <div class="col-6 py-1 d-flex justify-content-end align-item-center">
                <h3 class="text-end">Month Name: <span class="mx-2">{{ \Carbon\Carbon::parse($selectExpense->expense_date)->format('M, Y')}}</span></h3>
            </div>
            @endif
            {{--  --}}
            <div class="col-12">
                @if ($selectExpenses->isEmpty())
                <h4 class="text-center py-2">Not Data Founded</h4>
                @else
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="py-2" style="width:14%;text-align:center;border:1px solid black">Date</th>
                            <th class="py-2" style="width:15%;text-align:center;border:1px solid black">Expense Category</th>
                            <th class="py-2" style="width:15%;text-align:center;border:1px solid black">Bill No</th>
                            <th class="py-2" style="width:14%;text-align:center;border:1px solid black">Amount</th>
                            <th class="py-2" style="width:14%;text-align:center;border:1px solid black">Total</th>
                            <th class="py-2" style="width:14%;text-align:center;border:1px solid black">Pay Method</th>
                            <th class="py-2" style="width:14%;text-align:center;border:1px solid black">Patticash</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($selectExpenses as $selectExpense)
                    <tr>
                        <td class="py-1 px-2" style="width:14%;text-align:center;border:1px solid black;font-size:12px;">{{ \Carbon\Carbon::parse($selectExpense->expense_date)->format('M d, Y')}} ( {{ \Carbon\Carbon::parse($selectExpense->expense_date)->format('D')}} )</td>
                        <td class="py-1 px-2" style="width:15%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $expense_category_type = isset($selectExpense->expense_category_type) ? json_decode($selectExpense->expense_category_type, true) : [];
                            @endphp
                            @foreach ($expense_category_type as $key => $expense_category_types)
                            @if(isset($expense_category_types))
                            @if ($expense_category_type[$key] == '1')
                            <span>Utilities Expense</span>
                            <br>
                            @elseif($expense_category_type[$key] == '2')
                            <span>Travel Expense</span>
                            <br>
                            @elseif($expense_category_type[$key] == '3')
                            <span>Shipment Expense</span>
                            <br>
                            @elseif($expense_category_type[$key] == '4')
                            <span>Office Expense</span>
                            <br>
                            @elseif($expense_category_type[$key] == '5')
                            <span>Other Expense</span>
                            <br>
                            @elseif($expense_category_type[$key] == '6')
                            <span>Salaries Expense</span>
                            <br>
                            @elseif($expense_category_type[$key] == '7')
                            <span>Office Rent</span>
                            <br>
                            @else
                            <span>Md Expense</span>
                            <br>
                            @endif
                            @endif
                        @endforeach
                        </td>
                        <td class="py-1 px-2" style="width:15%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $expense_category_type = isset($selectExpense->expense_category_type) ? json_decode($selectExpense->expense_category_type, true) : [];
                            $expense_slip= isset($selectExpense->slip_number) ? json_decode($selectExpense->slip_number, true) : [];
                            @endphp
                            @foreach ($expense_category_type as $key => $expense_category_types)
                            <span>
                                {{ $expense_slip[$key] }}
                            </span>
                            <br>
                            @endforeach
                        </td>
                        <td class="py-1 px-2" style="width:14%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $expense_category_type = isset($selectExpense->expense_category_type) ? json_decode($selectExpense->expense_category_type, true) : [];
                            $expense_amount= isset($selectExpense->expense_amount) ? json_decode($selectExpense->expense_amount, true) : [];
                            @endphp
                            @foreach ($expense_category_type as $key => $expense_category_types)
                            <span>
                                {{ $expense_amount[$key] }} /=
                            </span>
                            <br>
                            @endforeach
                        </td>
                        <td class="py-1 px-2" style="width:14%;text-align:center;border:1px solid black;font-size:12px;">{{ $selectExpense->total_use_amount }} /=</td>
                        <td class="py-1 px-2" style="width:14%;text-align:center;border:1px solid black;font-size:12px;">
                            @php
                            $expense_category_type = isset($selectExpense->expense_category_type) ? json_decode($selectExpense->expense_category_type, true) : [];
                            $expense_payment_method = isset($selectExpense->expense_payment_method) ? json_decode($selectExpense->expense_payment_method, true) : [];
                            @endphp
                            @foreach ($expense_category_type as $key => $expense_category_types)
                                @if ($expense_payment_method[$key] == '1')
                                  <span>Cash Payment</span> <br>
                                @elseif ($expense_payment_method[$key] == '2')
                                  <span>Online Payment</span> <br>
                                @endif
                            @endforeach
                        </td>
                        <td class="py-1 px-2" style="width:14%;text-align:center;border:1px solid black;font-size:12px;">
                            @if (empty($selectExpense->expense_patticash_amount))
                                
                            @else
                            {{ $selectExpense->expense_patticash_amount }} /=
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    @php
                        $select = DB::table('expenses')->get();
                        $totalAmount = 0;
                        $totalPatticash = 0;
                        $remainingAmount = 0;
                        $totalUtilities = 0;
                        $totalTravel = 0;
                        $totalOtherExp = 0;
                        $totalShipment = 0;
                        $totalOfficeRent = 0;
                        $totalMd = 0;
                        $totalEmpSalary = 0;
                        foreach($select as $expense) {
                        $totalAmount += $expense->total_use_amount;
                        $totalPatticash += $expense->expense_patticash_amount;
                        $expense_category_type = isset($expense->expense_category_type) ? json_decode($expense->expense_category_type, true) : [];
                        $expense_amount = isset($expense->expense_amount) ? json_decode($expense->expense_amount, true) : [];
                        foreach ($expense_category_type as $key => $value) {
                            switch ($value) {
                                case '1':
                                    $totalUtilities += $expense_amount[$key];
                                    break;
                                case '2':
                                    $totalTravel += $expense_amount[$key];
                                    break;
                                case '3':
                                    $totalShipment += $expense_amount[$key];
                                    break;
                                case '4':
                                    $totalOfficeRent += $expense_amount[$key];
                                    break;
                                case '5':
                                    $totalOtherExp += $expense_amount[$key];
                                    break;
                                case '6':
                                    $totalEmpSalary += $expense_amount[$key];
                                    break;
                                case '7':
                                    $totalOfficeRent += $expense_amount[$key];
                                    break;
                                case '8':
                                    $totalMd += $expense_amount[$key];
                                    break;
                            }
                        }
                        }
                    $remainingAmount += $expense->remaining_patticash_this_month;
                    // 
                    
                    @endphp
                    <div class="row pt-3">
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Patticash Received:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalPatticash }} /=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Remaining Patticash:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $remainingAmount }} /=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Utilities Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalUtilities }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Travel Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalTravel }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Other Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalOtherExp }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Shipment Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalShipment }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Office Rent:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalOfficeRent }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">MD Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalMd }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Employee Salaries:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalEmpSalary }}/=">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center py-1">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, demo category" name="categoryName" disabled value="{{ $totalAmount }} /=">
                            </div>
                        </div>
                    </div>
                @endif     
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