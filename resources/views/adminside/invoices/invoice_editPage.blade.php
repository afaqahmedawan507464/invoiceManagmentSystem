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
    <title>Scope Visions | Edit Invoice</title>
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
                        {{-- <div class="col-6">
                            <a href="{{ route('quotationListPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div> --}}
                        <div class="col-12">
                            <h4 class="text-end">Edit Invoice</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-3 py-3">
                @foreach ($selectQuotation as $selectQuotations)
                    
                @endforeach
                @if ($selectQuotations->invoice_scope_model == '')
                @if ($selectQuotations->invoice_item_disposible_batchNo == '')
                <form action="{{ route('editInvoiceRepairingOperation',$selectQuotations->id) }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-10 py-2 px-2">
                        {{--  --}}
                        <h4>Invoice Basic Information</h4>
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Invoice Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationNumber" value="{{ $selectQuotations->invoice_number }}">
                            </div>
                        </div>
                        @if (empty($selectQuotations->quotation_id ))
                        @else
                        <div class="col-12 d-none">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quotation Id:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationId" value="{{ $selectQuotations->quotation_id }}">
                            </div>
                        </div>
                        @endif
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Billing To:</label>
                                <select name="quotationClient" id="quotationClient" class="form-control">
                                    <option value="{{ $selectQuotations->invoice_client_id }}">{{ $selectQuotations->client_name }}</option>
                                    @if ( $selectClient->isEmpty() )
                            
                                    @else
                                       @foreach ($selectClient as $selectClients)
                                       <option value="{{ $selectClients->id }}">{{ $selectClients->client_name }}</option>
                                       @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationDate" value="{{ $selectQuotations->invoice_date }}">
                            </div>
                        </div>
                        <div class="col-12 d-none">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                <textarea name="quotationHeading" id="quotationHeading" class="form-control" placeholder="Ex, Data" cols="30" rows="4">{{ $selectQuotations->invoice_heading }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        </div>
                        {{--  --}}
                        <h4>Invoice Item Details</h4>
                        {{--  --}}
                        @php
                        $quotation_item_srNumber = isset($selectQuotations->invoice_item_srNumber) ? json_decode($selectQuotations->invoice_item_srNumber, true) : [];
                        $quotation_item_description = isset($selectQuotations->invoice_item_decription) ? json_decode($selectQuotations->invoice_item_decription, true) : [];
                        $quotation_total_price = isset($selectQuotations->invoice_total_price) ? json_decode($selectQuotations->invoice_total_price, true) : [];
                        @endphp
                        {{--  --}}
                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                        <div id="add_form">
                            <div id="show_items">
                                <div class="row px-2 py-2">
                                   <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemSrNumber[]" value="{{ $quotation_item_srNumbers }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Description</label>
                                            <select name="quotationItemDescription[]" id="quotationItemDescription" class="form-control">
                                                @if(isset($quotation_item_description[$key]))
                                                    @php
                                                        $item = DB::table('stock_records')->where('id', $quotation_item_description[$key])->first();
                                                    @endphp
                                                    @endif
                                                    <option value="{{ $quotation_item_description[$key] }}">{{ $item ? $item->item_name : '' }}</option>
                                                    @if ( $selectStock->isEmpty() )
                                            
                                                    @else
                                                       @foreach ($selectStock as $selectStocks)
                                                       <option value="{{ $selectStocks->id }}">{{ $selectStocks->item_name }}</option>
                                                       @endforeach
                                                    @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount/Rate:</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemAmount[]" value="{{ $quotation_total_price[$key] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{--  --}}
                        <h4>Term And Conditions</h4>
                        {{--  --}}
                        @php
                            $quotation_termAndConditions = isset($selectQuotations->invoice_termAndConditions) ? json_decode($selectQuotations->invoice_termAndConditions, true) : [];
                        @endphp
                        {{--  --}}
                        @foreach ($quotation_termAndConditions as $quotation_termAndCondition)
                        {{--  --}}
                        <div id="add_form1">
                        <div id="show_items1">
                        <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                    <input type="text" class="form-control" placeholder="Ex, Term And Conditions" name="quotationTermAndConditions[]" value="{{ $quotation_termAndCondition }}">
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        {{--  --}}
                        @endforeach
                        {{--  --}}
                        @if ( empty ( $selectQuotations->invoice_gsttext ) )
                            
                        @else
                        {{--  --}}
                        <h4>Invoice GST Text</h4>
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">GST Text:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationGstText" value="{{ $selectQuotations->invoice_gsttext }}">
                            </div>
                        </div>
                        {{--  --}}
                        {{--  --}}
                        </div>
                        @endif
                        {{--  --}}
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </form>
                @else
                <form action="{{ route('editInvoiceDisposibleOperation',$selectQuotations->id) }}" method="post" class="row" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="col-10 py-2 px-2">
                        {{--  --}}
                        <h4>Invoice Basic Information</h4>
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Invoice Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationNumber" value="{{ $selectQuotations->invoice_number }}">
                            </div>
                        </div>
                        @if ( empty ($selectQuotations->quotation_id) )
                            
                        @else
                        <div class="col-12 d-none">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quotation Id:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationId" value="{{ $selectQuotations->quotation_id }}">
                            </div>
                        </div>
                        @endif
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Billing To:</label>
                                <select name="quotationClient" id="quotationClient" class="form-control">
                                    <option value="{{ $selectQuotations->invoice_client_id }}">{{ $selectQuotations->client_name }}</option>
                                    @if ( $selectClient->isEmpty() )
                            
                                    @else
                                       @foreach ($selectClient as $selectClients)
                                       <option value="{{ $selectClients->id }}">{{ $selectClients->client_name }}</option>
                                       @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationDate" value="{{ $selectQuotations->invoice_date }}">
                            </div>
                        </div>
                        <div class="col-12 d-none">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                <textarea name="quotationHeading" id="quotationHeading" class="form-control" placeholder="Ex, Data" cols="30" rows="4">{{ $selectQuotations->invoice_heading }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        </div>
                        {{--  --}}
                        <h4>Invoice Item Details</h4>
                        {{--  --}}
                        @php
                        $quotation_item_srNumber = isset($selectQuotations->invoice_item_srNumber) ? json_decode($selectQuotations->invoice_item_srNumber, true) : [];
                        $quotation_item_description = isset($selectQuotations->item_id) ? json_decode($selectQuotations->item_id, true) : [];
                        $quotation_item_name = isset($selectQuotations->item_name) ? json_decode($selectQuotations->item_name, true) : [];
                        $quotation_total_price = isset($selectQuotations->invoice_total_price) ? json_decode($selectQuotations->invoice_total_price, true) : [];
                        $quotation_item_disposible_batchNo = isset($selectQuotations->invoice_item_disposible_batchNo) ? json_decode($selectQuotations->invoice_item_disposible_batchNo, true) : [];
                        $quotation_item_disposible_expDate = isset($selectQuotations->invoice_item_disposible_expDate) ? json_decode($selectQuotations->invoice_item_disposible_expDate, true) : [];
                        $quotation_item_disposible_qtv = isset($selectQuotations->invoice_item_disposible_qtv) ? json_decode($selectQuotations->invoice_item_disposible_qtv, true) : [];
                        $quotation_item_disposible_pricePerUnit = isset($selectQuotations->invoice_item_disposible_pricePerUnit) ? json_decode($selectQuotations->invoice_item_disposible_pricePerUnit, true) : [];
                        @endphp
                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                        <div id="add_form">
                            <div id="show_items4">
                                <div class="row px-2 py-2">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemSrNumber[]" value="{{ $quotation_item_srNumbers }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Description</label>
                                            <select name="quotationItemDescription[]" id="quotationItemDescription" class="form-control">
                                                @if(isset($quotation_item_description[$key]))
                                                    @php
                                                        $item = DB::table('stock_records')->where('id', $quotation_item_description[$key])->first();
                                                    @endphp
                                                    @endif
                                                    <option value="{{ $quotation_item_description[$key] }}">{{ $item ? $item->item_name : '' }}</option>
                                                    @if ( $selectStock->isEmpty() )
                                            
                                                    @else
                                                       @foreach ($selectStock as $selectStocks)
                                                       <option value="{{ $selectStocks->id }}">{{ $selectStocks->item_name }}</option>
                                                       @endforeach
                                                    @endif
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Batch No</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemBatchNumber[]" value = "{{ $quotation_item_disposible_batchNo[$key] }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Expire Date</label>
                                            <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationItemExpireDate[]" value = "{{ $quotation_item_disposible_expDate[$key] }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Qty</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemQtv[]" value = "{{ $quotation_item_disposible_qtv[$key] }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Price</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemPrice[]" value = "{{ $quotation_item_disposible_pricePerUnit[$key] }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                            <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemAmount[]" value="{{ $quotation_total_price[$key] }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <h4>Term And Conditions</h4>
                        {{--  --}}
                        @php
                            $quotation_termAndConditions = isset($selectQuotations->invoice_termAndConditions) ? json_decode($selectQuotations->invoice_termAndConditions, true) : [];
                        @endphp
                        {{--  --}}
                        @foreach ($quotation_termAndConditions as $quotation_termAndCondition)
                        {{--  --}}
                        <div id="add_form1">
                        <div id="show_items1">
                        <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                    <input type="text" class="form-control" placeholder="Ex, Term And Conditions" name="quotationTermAndConditions[]" value="{{ $quotation_termAndCondition }}">
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        {{--  --}}
                        @endforeach
                        {{--  --}}
                        @if ( empty ( $selectQuotations->invoice_gsttext ) )
                            
                        @else
                        {{--  --}}
                        <h4>Invoice GST Text</h4>
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">GST Text:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationGstText" value="{{ $selectQuotations->invoice_gsttext }}">
                            </div>
                        </div>
                        {{--  --}}
                        {{--  --}}
                        </div>
                        @endif
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                        {{--  --}}
                    </div>
                </form>  
                @endif
                @else
                <form action="{{ route('updateInvoiceRepairing_Operation',$selectQuotations->id) }}" method="post" class="row px-3 py-2" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-10 py-2 px-2">
                        {{--  --}}
                        <h4>Invoice Basic Information</h4>
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Invoice Number:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationNumber" value="{{ $selectQuotations->invoice_number }}">
                            </div>
                        </div>
                        <div class="col-12 d-none">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quotation Id:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationId" value="{{ $selectQuotations->id }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Billing To:</label>
                                <select name="quotationClient" id="quotationClient" class="form-control">
                                    <option value="{{ $selectQuotations->invoice_client_id }}">{{ $selectQuotations->client_name }}</option>
                                    @if ( $selectClient->isEmpty() )
                            
                                    @else
                                       @foreach ($selectClient as $selectClients)
                                       <option value="{{ $selectClients->id }}">{{ $selectClients->client_name }}</option>
                                       @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="quotationDate" value="{{ $selectQuotations->invoice_date }}">
                            </div>
                        </div>
                        <div class="col-12 d-none">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                <textarea name="quotationHeading" id="quotationHeading" class="form-control" placeholder="Ex, Data" cols="30" rows="4">{{ $selectQuotations->invoice_heading }}</textarea>
                            </div>
                        </div>
                        {{--  --}}
                        </div>
                        {{--  --}}
                        <h4>Invoice Item Details</h4>
                        {{--  --}}
                        @php
                        $quotation_item_srNumber = isset($selectQuotations->invoice_item_srNumber) ? json_decode($selectQuotations->invoice_item_srNumber, true) : [];
                        $quotation_scope_model = isset($selectQuotations->invoice_scope_model) ? json_decode($selectQuotations->invoice_scope_model, true) : [];
                        $quotation_total_price = isset($selectQuotations->invoice_total_price) ? json_decode($selectQuotations->invoice_total_price, true) : [];
                        $quotation_scope_srno = isset($selectQuotations->invoice_scope_srno) ? json_decode($selectQuotations->invoice_scope_srno, true) : [];
                        $quotation_scope_problem = isset($selectQuotations->invoice_scope_problem) ? json_decode($selectQuotations->invoice_scope_problem, true) : [];
                        $quotation_need_work = isset($selectQuotations->invoice_need_work) ? json_decode($selectQuotations->invoice_need_work, true) : [];
                        @endphp
                        {{--  --}}
                        <div id="add_form">
                        @foreach ($quotation_item_srNumber as $key => $quotation_item_srNumbers)
                    
                        <div id="show_items7">
                        <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemSrNumber[]" value="{{ $quotation_item_srNumbers }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Model:</label>
                                    <input type="text" class="form-control" placeholder="Ex, cf-140L" name="quotationItemScopeModel[]" value="{{ $quotation_scope_model[$key] }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Scope Sr No:</label>
                                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemScopeSrNumber[]" value="{{ $quotation_scope_srno[$key] }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Problem</label>
                                    <textarea name="quotationItemProblem[]" id="quotationItemProblem" class="form-control" placeholder="Ex, Description" cols="30" rows="2">{{ $quotation_scope_problem[$key] }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Need Work</label>
                                    <textarea name="quotationItemNeedWork[]" id="quotationItemNeedWork" class="form-control" placeholder="Ex, Description" cols="30" rows="5">{{ $quotation_need_work[$key] }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount/Rate:</label>
                                    <input type="number" class="form-control" placeholder="Ex, 132" name="quotationItemAmount[]" value="{{ $quotation_total_price[$key] }}">
                                </div>
                            </div>
                            {{--  --}}
                        </div>
                        </div>
                        </div>
                        @endforeach
                        <h4>Term And Conditions</h4>
                        {{--  --}}
                        @php
                            $quotation_termAndConditions = isset($selectQuotations->invoice_termAndConditions) ? json_decode($selectQuotations->invoice_termAndConditions, true) : [];
                        @endphp
                        {{--  --}}
                        @foreach ($quotation_termAndConditions as $quotation_termAndCondition)
                        {{--  --}}
                        <div id="add_form1">
                        <div id="show_items1">
                        <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;"></label>
                                    <input type="text" class="form-control" placeholder="Ex, Term And Conditions" name="quotationTermAndConditions[]" value="{{ $quotation_termAndCondition }}">
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        {{--  --}}
                        @endforeach
                        {{--  --}}
                        @if ( empty ( $selectQuotations->invoice_gsttext ) )
                            
                        @else
                        {{--  --}}
                        <h4>Invoice GST Text</h4>
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">GST Text:</label>
                                <input type="text" class="form-control" placeholder="Ex, ABC123" name="quotationGstText" value="{{ $selectQuotations->invoice_gsttext }}">
                            </div>
                        </div>
                        {{--  --}}
                        @endif
                        {{--  --}}
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                        </div>
                        {{--  --}}
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