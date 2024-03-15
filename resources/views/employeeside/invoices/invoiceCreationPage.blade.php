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
    <title>Scope Visions | New Invoice</title>
</head>

<body>
    <div class="container mt-2">

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
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-end">Create Invoice</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($selectQuotation as $selectQuotations)
                    @endforeach
                    @if ($selectQuotations->quotation_scope_model == '')
                        @if ($selectQuotations->quotation_item_disposible_batchNo == '')
                            <form action="{{ route('createOperationInvoiceRepairingOperation') }}" method="post"
                                class="row" enctype="multipart/form-data">
                                @csrf
                                <div class="col-10 py-2 px-2">
                                    {{--  --}}
                                    <h4>Invoice Basic Information</h4>
                                    {{--  --}}
                                    <div class="row px-2 py-2">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center py-2">
                                                <label class="text-end mx-2 mt-1" for=""
                                                    style="width:300px;">Invoice Number:</label>
                                                <input type="text" class="form-control" placeholder="Ex, ABC123"
                                                    name="quotationNumber"
                                                    value="{{ $selectQuotations->quotation_number }}">
                                            </div>
                                        </div>
                                        <div class="col-12 d-none">
                                            <div class="d-flex justify-content-center align-items-center py-2">
                                                <label class="text-end mx-2 mt-1" for=""
                                                    style="width:300px;">Quotation Id:</label>
                                                <input type="text" class="form-control" placeholder="Ex, ABC123"
                                                    name="quotationId" value="{{ $selectQuotations->id }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center py-2">
                                                <label class="text-end mx-2 mt-1" for=""
                                                    style="width:300px;">Billing To:</label>
                                                <select name="quotationClient" id="quotationClient"
                                                    class="form-control">
                                                    <option value="{{ $selectQuotations->client_id }}">
                                                        {{ $selectQuotations->client_name }}</option>
                                                    @if ($selectClient->isEmpty())
                                                    @else
                                                        @foreach ($selectClient as $selectClients)
                                                            <option value="{{ $selectClients->id }}">
                                                                {{ $selectClients->client_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                    <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationDate" value="{{ $selectQuotations->quotation_date }}">
                                </div>
                            </div> --}}
                                        <div class="col-12 d-none">
                                            <div class="d-flex justify-content-center align-items-center py-2">
                                                <label class="text-end mx-2 mt-1" for=""
                                                    style="width:300px;"></label>
                                                <textarea name="quotationHeading" id="quotationHeading" class="form-control" placeholder="Ex, Data" cols="30"
                                                    rows="4">{{ $selectQuotations->quotation_heading }}</textarea>
                                            </div>
                                        </div>
                                        {{--  --}}
                                    </div>
                                    {{--  --}}
                                    <h4>Invoice Item Details</h4>
                                    {{--  --}}
                                    {{-- @php
                            $quotation_item_srNumber = isset($selectQuotations->quotation_item_srNumber) ? json_decode($selectQuotations->quotation_item_srNumber, true) : [];
                            $quotation_item_description = isset($selectQuotations->quotation_item_decription) ? json_decode($selectQuotations->quotation_item_decription, true) : [];
                            $quotation_total_price = isset($selectQuotations->quotation_total_price) ? json_decode($selectQuotations->quotation_total_price, true) : [];
                            @endphp
                            {{--  --}}
                                    {{-- @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers) --}}
                                    <div id="add_form">
                                        <div id="show_items">
                                            <div class="row px-2 py-2">
                                                <div class="col-12 py-2">
                                                    <div class="row">
                                                        <div class="col-8"></div>
                                                        <div
                                                            class="col-4 d-flex justify-content-end align-items-center">
                                                            <button class="btn btn-outline-primary add_item_btn"><i
                                                                    class="mx-2 fas fa-plus"></i>Add More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Serial Number:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemSrNumber[]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Description</label>
                                                        <select name="quotationItemDescription[]"
                                                            id="quotationItemDescription" class="form-control">
                                                            <option value="">Select Items</option>
                                                            @if ($selectStock->isEmpty())
                                                            @else
                                                                @foreach ($selectStock as $selectStocks)
                                                                    <option value="{{ $selectStocks->id }}">
                                                                        {{ $selectStocks->item_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Amount/Rate:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemAmount[]">
                                                    </div>
                                                </div>
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                    {{--  --}}
                                    <h4>Term And Conditions</h4>
                                    {{--  --}}
                                    <div id="add_form1">
                                        <div id="show_items1">
                                            <div class="row px-2 py-2">
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;"></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Ex, Term And Conditions"
                                                            name="quotationTermAndConditions[]">
                                                        <button class="btn btn-outline-primary add_item_btn1 mx-2"><i
                                                                class="mx-2 fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    @if (empty($selectQuotations->quotation_gsttext))
                                    @else
                                        {{--  --}}
                                        <h4>Invoice GST Text</h4>
                                        {{--  --}}
                                        <div class="row px-2 py-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center py-2">
                                                    <label class="text-end mx-2 mt-1" for=""
                                                        style="width:300px;">GST Text:</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Ex, ABC123" name="quotationGstText"
                                                        value="{{ $selectQuotations->quotation_gsttext }}">
                                                </div>
                                            </div>
                                            {{--  --}}
                                            {{--  --}}
                                        </div>
                                    @endif
                                    {{--  --}}
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary">Save</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('createOperationInvoiceDisposibleOperation') }}" method="post"
                                class="row" enctype="multipart/form-data">
                                @csrf
                                <div class="row px-2 py-2">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;">Invoice Number:</label>
                                            <input type="text" class="form-control" placeholder="Ex, ABC123"
                                                name="quotationNumber"
                                                value="{{ $selectQuotations->quotation_number }}">
                                        </div>
                                    </div>
                                    <div class="col-12 d-none ">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;">Quotation Id:</label>
                                            <input type="text" class="form-control" placeholder="Ex, ABC123"
                                                name="quotationId" value="{{ $selectQuotations->id }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;">Billing To:</label>
                                            <select name="quotationClient" id="quotationClient" class="form-control">
                                                <option value="{{ $selectQuotations->client_id }}">
                                                    {{ $selectQuotations->client_name }}</option>
                                                @if ($selectClient->isEmpty())
                                                @else
                                                    @foreach ($selectClient as $selectClients)
                                                        <option value="{{ $selectClients->id }}">
                                                            {{ $selectClients->client_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                    <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationDate" value="{{ $selectQuotations->quotation_date }}">
                                </div>
                            </div> --}}
                                    <div class="col-12 d-none">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;"></label>
                                            <textarea name="quotationHeading" id="quotationHeading" class="form-control" placeholder="Ex, Data" cols="30"
                                                rows="4">{{ $selectQuotations->quotation_heading }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    {{--  --}}
                                    <h4>Invoice Item Details</h4>
                                    {{--  --}}
                                    {{--  --}}
                                    <div id="add_form">
                                        <div id="show_items4">
                                            <div class="row px-2 py-2">
                                                <div class="col-12 py-2">
                                                    <div class="row">
                                                        <div class="col-8"></div>
                                                        <div
                                                            class="col-4 d-flex justify-content-end align-items-center">
                                                            <button class="btn btn-outline-primary add_item_btn4"><i
                                                                    class="mx-2 fas fa-plus"></i>Add More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Serial Number:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemSrNumber[]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Item:</label>
                                                        <select name="quotationItemDescription[]"
                                                            id="quotationItemDescription" class="form-control">
                                                            <option value="">Select Items</option>
                                                            @if ($selectStock->isEmpty())
                                                            @else
                                                                @foreach ($selectStock as $selectStocks)
                                                                    <option value="{{ $selectStocks->id }}">
                                                                        {{ $selectStocks->item_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Batch No</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemBatchNumber[]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Expire Date</label>
                                                        <input type="date" class="form-control"
                                                            placeholder="Ex, 12-12-0000"
                                                            name="quotationItemExpireDate[]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Qty</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemQtv[]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Price</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemPrice[]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Total Amount:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemAmount[]">
                                                    </div>
                                                </div>
                                                {{--  --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <h4>Term And Conditions</h4>
                                    {{--  --}}
                                    <div id="add_form1">
                                        <div id="show_items1">
                                            <div class="row px-2 py-2">
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;"></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Ex, Term And Conditions"
                                                            name="quotationTermAndConditions[]">
                                                        <button class="btn btn-outline-primary add_item_btn1 mx-2"><i
                                                                class="mx-2 fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    @if (empty($selectQuotations->quotation_gsttext))
                                    @else
                                        {{--  --}}
                                        <h4>Invoice GST Text</h4>
                                        {{--  --}}
                                        <div class="row px-2 py-2">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-center align-items-center py-2">
                                                    <label class="text-end mx-2 mt-1" for=""
                                                        style="width:300px;">GST Text:</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Ex, ABC123" name="quotationGstText"
                                                        value="{{ $selectQuotations->quotation_gsttext }}">
                                                </div>
                                            </div>
                                            {{--  --}}
                                            {{--  --}}
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-outline-primary">save</button>
                                    </div>
                                    {{--  --}}
                                </div>
                            </form>
                        @endif
                    @else
                        <form action="{{ route('createOperationInvoiceRepairing_Operation') }}" method="post"
                            class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="col-10 py-2 px-2">
                                {{--  --}}
                                <h4>Invoice Basic Information</h4>
                                {{--  --}}
                                <div class="row px-2 py-2">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;">Invoice Number:</label>
                                            <input type="text" class="form-control" placeholder="Ex, ABC123"
                                                name="quotationNumber"
                                                value="{{ $selectQuotations->quotation_number }}">
                                        </div>
                                    </div>
                                    <div class="col-12 d-none ">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;">Quotation Id:</label>
                                            <input type="text" class="form-control" placeholder="Ex, ABC123"
                                                name="quotationId" value="{{ $selectQuotations->id }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;">Billing To:</label>
                                            <select name="quotationClient" id="quotationClient" class="form-control">
                                                <option value="{{ $selectQuotations->client_id }}">
                                                    {{ $selectQuotations->client_name }}</option>
                                                @if ($selectClient->isEmpty())
                                                @else
                                                    @foreach ($selectClient as $selectClients)
                                                        <option value="{{ $selectClients->id }}">
                                                            {{ $selectClients->client_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                    <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationDate" value="{{ $selectQuotations->quotation_date }}">
                                </div>
                            </div> --}}
                                    <div class="col-12 d-none">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for=""
                                                style="width:300px;"></label>
                                            <textarea name="quotationHeading" id="quotationHeading" class="form-control" placeholder="Ex, Data" cols="30"
                                                rows="4">{{ $selectQuotations->quotation_heading }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                {{--  --}}
                                <h4>Invoice Item Details</h4>
                                {{--  --}}
                                @php
                                    $quotation_item_srNumber = isset($selectQuotations->quotation_item_srNumber)
                                        ? json_decode($selectQuotations->quotation_item_srNumber, true)
                                        : [];
                                    $quotation_scope_model = isset($selectQuotations->quotation_scope_model)
                                        ? json_decode($selectQuotations->quotation_scope_model, true)
                                        : [];
                                    $quotation_total_price = isset($selectQuotations->quotation_total_price)
                                        ? json_decode($selectQuotations->quotation_total_price, true)
                                        : [];
                                    $quotation_scope_srno = isset($selectQuotations->quotation_scope_srno)
                                        ? json_decode($selectQuotations->quotation_scope_srno, true)
                                        : [];
                                    $quotation_scope_problem = isset($selectQuotations->quotation_scope_problem)
                                        ? json_decode($selectQuotations->quotation_scope_problem, true)
                                        : [];
                                    $quotation_need_work = isset($selectQuotations->quotation_need_work)
                                        ? json_decode($selectQuotations->quotation_need_work, true)
                                        : [];
                                @endphp
                                {{--  --}}
                                @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                                    {{--  --}}
                                    <div id="add_form">
                                        <div id="show_items7">
                                            <div class="row px-2 py-2">
                                                {{-- <div class="col-12 py-2">
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <button class="btn btn-outline-primary add_item_btn11"><i class="mx-2 fas fa-plus"></i>Add More</button>
                                        </div>
                                    </div>
                                </div> --}}
                                                <div class="col-12 text-center"><span class="mx-2"><b>Scope Model :
                                                            {{ $quotation_scope_model[$key] }}</b></span> <span
                                                        class="mx-2"><b>Scope Serial Number :
                                                            {{ $quotation_scope_srno[$key] }}</b></span></div>
                                                <div class="col-12 d-none">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Serial Number:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemSrNumber[]"
                                                            value="{{ $quotation_item_srNumbers }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-none">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Scope Model:</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Ex, cf-140L" name="quotationItemScopeModel[]"
                                                            value="{{ $quotation_scope_model[$key] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-none">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Scope Sr No:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemScopeSrNumber[]"
                                                            value="{{ $quotation_scope_srno[$key] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-none">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Problem</label>
                                                        <textarea name="quotationItemProblem[]" id="quotationItemProblem" class="form-control" placeholder="Ex, Description"
                                                            cols="30" rows="2">{{ $quotation_scope_problem[$key] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-start py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Need Done</label>
                                                        <textarea name="quotationItemNeedWork[]" id="quotationItemNeedWork" class="form-control"
                                                            placeholder="Ex, Description" cols="30" rows="5">{{ $quotation_need_work[$key] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-center align-items-center py-2">
                                                        <label class="text-end mx-2 mt-1" for=""
                                                            style="width:300px;">Amount/Rate:</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Ex, 132" name="quotationItemAmount[]"
                                                            value="{{ $quotation_total_price[$key] }}">
                                                    </div>
                                                </div>
                                                {{--  --}}
                                @endforeach
                                {{--  --}}
                            </div>
                </div>
            </div>
            <h4>Term And Conditions</h4>
            {{--  --}}
            <div id="add_form1">
                <div id="show_items1">
                    <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                <input type="text" class="form-control" placeholder="Ex, Term And Conditions"
                                    name="quotationTermAndConditions[]">
                                <button class="btn btn-outline-primary add_item_btn1 mx-2"><i
                                        class="mx-2 fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>Invoice GST Text</h4>
            {{--  --}}
            <div class="row px-2 py-2">
                <div class="col-12">
                    <div class="d-flex justify-content-center align-items-center py-2">
                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">GST Text:</label>
                        <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationGstText">
                    </div>
                </div>
                {{--  --}}
            </div>
            {{--  --}}
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
        </form>
        @endif
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
    <script src="/custom2.js"></script>
</body>

</html>
