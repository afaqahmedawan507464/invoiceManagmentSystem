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
    <title>Scope Visions | Details Others</title>
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
                            <a href="{{ route('IncomingAndOutgoingDataDailyRecordList') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h4 class="text-end">Incoming And Outgoing Daily Record Detail Page</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($selectIncomingAndOutgoingDataDailyRecord as $selectIncomingAndOutgoingDataDailyRecords)
                                
                @endforeach
                @if (empty($selectIncomingAndOutgoingDataDailyRecords->item_model)) 
                {{-- <form action="{{ route('updateOperationIncomingAndOutgoingDisposibleDailyRecord',$selectIncomingAndOutgoingDataDailyRecords->id) }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') --}}
                    <div class="col-10 py-2 px-2">
                        <div class="row px-2 py-2">
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Incoming Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-2023" name="scopeIncomingDate" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_incomingDate }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Details:</label>
                                <textarea name="descriptionItem" id="descriptionItem" cols="30" rows="3" class="form-control" placeholder="Ex, Alpha Numeric Data" disabled>{{ $selectIncomingAndOutgoingDataDailyRecords->incoming_description }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sender Name:</label>
                                <input type="text" class="form-control" placeholder="Ex, abc" name="senderName" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_sendername }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Incoming Slip Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123546789" name="incomingSlipNumber" value="{{ $selectIncomingAndOutgoingDataDailyRecords->incoming_type }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Batch Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123546789" name="itemBatchNumber" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_disposible_batchNo }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Expire Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 123546789" name="itemExpireDate" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_disposible_expDate }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Quantities:</label>
                                <input type="number" class="form-control" placeholder="Ex, 123546789" name="itemQty" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_disposible_qtv }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">outgoing Slip Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123546789" name="itemOutgoingSlipNumber" value="{{ $selectIncomingAndOutgoingDataDailyRecords->outgoing_type }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Outgoing Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 123546789" name="itemOutgoingDate" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_outgoing_date }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                    </div>
                    </div>
                    {{-- <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div> --}}
                {{-- </form> --}}
                @else
                {{-- <form action="{{ route('updateOperationIncomingAndOutgoingDataDailyRecord',$selectIncomingAndOutgoingDataDailyRecords->id) }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') --}}
                    <div class="col-10 py-2 px-2">
                        <div class="row px-2 py-2">
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Incoming Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-2023" name="scopeIncomingDate" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_incomingDate }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-start py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Details:</label>
                                <textarea name="descriptionItem" id="descriptionItem" cols="30" rows="3" class="form-control" placeholder="Ex, Alpha Numeric Data" disabled>{{ $selectIncomingAndOutgoingDataDailyRecords->incoming_description }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sender Name:</label>
                                <input type="text" class="form-control" placeholder="Ex, abc" name="senderName" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_sendername }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Incoming Slip Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123546789" name="incomingSlipNumber" value="{{ $selectIncomingAndOutgoingDataDailyRecords->incoming_type }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Model:</label>
                                <input type="text" class="form-control" placeholder="Ex, abc" name="itemModel" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_model }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Serial Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123546789" name="itemSrNo" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_srno }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">outgoing Slip Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123546789" name="itemOutgoingSlipNumber" value="{{ $selectIncomingAndOutgoingDataDailyRecords->outgoing_type }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Outgoing Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 123546789" name="itemOutgoingDate" value="{{ $selectIncomingAndOutgoingDataDailyRecords->item_outgoing_date }}" disabled>
                            </div>
                        </div>
                        {{--  --}}
                    </div>
                    </div>
                    {{-- <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div> --}}
                {{-- </form> --}}
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