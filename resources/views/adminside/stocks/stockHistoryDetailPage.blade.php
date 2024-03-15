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
    <title>Scope Visions | Detail Page Use & Send Stock</title>
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
        <div class="row pt-2 px-3">
            <div class="col-12">
                <h3 class="text-center">Products History</h3>
            </div>
            <div class="col-12">
                @if ( $stockDetails->isEmpty() )
                    <h4 class="text-center py-2">Not Data Founded</h4>
                @else
                @foreach ($stockDetails as $stockDetailss)
                    
                @endforeach
                <div class="row">
                    <div class="col-6 py-2">
                        <span><b>Item Name:</b><span class="mx-2" style="text-transform: uppercase">" {{ $stockDetailss->item_name }} "</span></span>
                    </div>
                    {{--  --}}
                    <div class="col-6 d-flex justify-content-end align-items-center py-2">
                        <span><b>Last Update:</b><span class="mx-2">" {{ \Carbon\Carbon::parse($stockDetailss->updated_at)->format('M d, Y') }} "</span></span>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                @if ( $stockDetails->isEmpty() )
                    
                @else
                @if (empty( $stockDetailss->inspection_id ))
                @if (empty ( $stockDetailss->item_batchNo ) )
                <div class="col-12 mb-1 d-flex justify-content-center align-items-center">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="py-2" style="width:56.6%;text-align:center;border:1px solid black">Reference Name</th>
                                <th class="py-2" style="width:15.6%;text-align:center;border:1px solid black">Invoice Number</th>
                                <th class="py-2" style="width:10.6%;text-align:center;border:1px solid black">Quantities</th>
                                <th class="py-2" style="width:16.6%;text-align:center;border:1px solid black">Date</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($stockDetails as $stockDetailss)
                            <tr>
                                <td class="py-2" style="width:56.6%;text-align:center;border:1px solid black">{{ $stockDetailss->client_name }}</td>
                                <td class="py-2" style="width:15.6%;text-align:center;border:1px solid black">{{ $stockDetailss->invoice_number }}</td>
                                <td class="py-2" style="width:10.6%;text-align:center;border:1px solid black">
                                    {{ $stockDetailss->solid_qtv }}
                                </td>
                                <td class="py-2" style="width:16.6%;text-align:center;border:1px solid black">
                                    {{ \Carbon\Carbon::parse($stockDetailss->invoice_date)->format('M d, Y') }}
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>  
                @else
                <div class="col-12 mb-1 d-flex justify-content-center align-items-center">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="py-2" style="width:23.6%;text-align:center;border:1px solid black">Reference Name</th>
                                <th class="py-2" style="width:15.6%;text-align:center;border:1px solid black">Invoice Number</th>
                                <th class="py-2" style="width:16.6%;text-align:center;border:1px solid black">Batch No</th>
                                <th class="py-2" style="width:16.6%;text-align:center;border:1px solid black">Exp Date</th>
                                <th class="py-2" style="width:10.6%;text-align:center;border:1px solid black">Quantities</th>
                                <th class="py-2" style="width:16.6%;text-align:center;border:1px solid black">Date</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($stockDetails as $stockDetailss)
                            <tr>
                                <td class="py-2" style="width:23.6%;text-align:center;border:1px solid black">{{ $stockDetailss->client_name }}</td>
                                <td class="py-2" style="width:15.6%;text-align:center;border:1px solid black">{{ $stockDetailss->invoice_number }}</td>
                                <td class="py-2" style="width:16.6%;text-align:center;border:1px solid black">
                                    {{ $stockDetailss->item_batchNo }}
                                </td>
                                <td class="py-2" style="width:16.6%;text-align:center;border:1px solid black">
                                    {{ \Carbon\Carbon::parse($stockDetailss->item_expDate)->format('M d, Y') }}
                                </td>
                                <td class="py-2" style="width:10.6%;text-align:center;border:1px solid black">
                                    {{ $stockDetailss->solid_qtv }}
                                </td>
                                <td class="py-2" style="width:16.6%;text-align:center;border:1px solid black">
                                    {{ \Carbon\Carbon::parse($stockDetailss->invoice_date)->format('M d, Y') }}
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
                @endif
                
                @else
                <div class="col-12 mb-1 d-flex justify-content-center align-items-center">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="py-2" style="width:40%;text-align:center;border:1px solid black">Reference Name</th>
                                <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Inspection Number</th>
                                <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Quantities</th>
                                <th class="py-2" style="width:20%;text-align:center;border:1px solid black">Date</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach ($stockDetails as $stockDetailss)
                            <tr>
                                <td class="py-2" style="width:40%;text-align:center;border:1px solid black">{{ $stockDetailss->sender_name }}</td>
                                <td class="py-2" style="width:20%;text-align:center;border:1px solid black">{{ $stockDetailss->inspection_id }}</td>
                                <td class="py-2" style="width:20%;text-align:center;border:1px solid black">
                                    {{ $stockDetailss->solid_qtv }}
                                </td>
                                <td class="py-2" style="width:20%;text-align:center;border:1px solid black">
                                    {{ \Carbon\Carbon::parse($stockDetailss->scope_incoming_date)->format('M d, Y') }}
                                </td>
                            </tr>
                            @endforeach
                         </tbody>
                    </table>
                </div>
                @endif
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