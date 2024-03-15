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
    <title>Scope Visions | Edit Stock</title>
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
                            <a href="{{ route('partListPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div> --}}
                        @foreach ($selectData as $selectDatas)
                            
                        @endforeach
                        <div class="col-12">
                            @if (!empty($selectDatas->incoming_report_ids))
                            <h3 class="text-end">Edit Page for scopes</h3>
                           @else
                               @if (!empty($selectDatas->item_batchNo))
                               <h3 class="text-end">Edit Page for disposible items</h3>
                               @else
                               @if (!empty($selectDatas->item_companyname))
                               <h3 class="text-end">Edit Page for others</h3>
                               @else
                               <h3 class="text-end">Edit Page for parts</h3>
                               @endif
                               @endif
                           @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($selectData->isEmpty())
                    
                @else
                @foreach ($selectData as $selectDatas) 
                @endforeach
                @if (!empty($selectDatas->incoming_report_ids))
                    <form action="{{ route('updateOperationStockScopesData',$selectDatas->id) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-10 py-2 px-2">
                            <div class="row px-2 py-2">
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-start py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Description:</label>
                                    <input type="text" class="form-control" placeholder="Ex, Scope" name="itemDetails" value="{{ $selectDatas->item_name }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Price Per Unit:</label>
                                    <input type="text" class="form-control" placeholder="Ex, 123465" name="itemPricePerUnit" value="{{ $selectDatas->ratePerUnit }}">
                                </div>
                            </div>
                            
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quantity:</label>
                                    <input type="text" class="form-control" placeholder="Ex, 123465" name="itemQuantity" value="{{ $selectDatas->item_qtv }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                    <input type="text" class="form-control" placeholder="Ex, 12345678" name="itemSerialNo" value="{{ $selectDatas->item_srno }}">
                                </div>
                            </div>
                            {{--  --}}
                            <div class="col-12">
                                <div class="d-flex justify-content-center align-items-center py-2">
                                    <label class="text-end mx-2 mt-1" for="" style="width:300px;">Model Number:</label>
                                    <input type="text" class="form-control" placeholder="Ex, cf-140L" name="itemModel" value="{{ $selectDatas->item_scope_model }}">
                                </div>
                            </div>
                            {{--  --}}
                            {{--  --}}
                         <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const itemPricePerUnitInput = document.querySelector('input[name="itemPricePerUnit"]');
                                const itemQuantityInput = document.querySelector('input[name="itemQuantity"]');
                                const itemTotalPriceInput = document.querySelector('input[name="itemTotalPrice"]');
                                
                                itemPricePerUnitInput.addEventListener('input', function() {
                                    calculateTotalPrice();
                                });
                                
                                itemQuantityInput.addEventListener('input', function() {
                                    calculateTotalPrice();
                                });
                                
                                function calculateTotalPrice() {
                                    const pricePerUnit = parseFloat(itemPricePerUnitInput.value) || 0;
                                    const quantity = parseFloat(itemQuantityInput.value) || 0;
                                    const totalPrice = pricePerUnit * quantity;
                                    
                                    itemTotalPriceInput.value = totalPrice.toFixed(2);
                                }
                            });
                        </script>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123465" name="itemTotalPrice">
                            </div>
                        </div>
                        {{--  --}}
                        </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </form>
                @else
                    @if (!empty($selectDatas->item_batchNo))
                        <form action="{{ route('updateOperationStockDisposibleData',$selectDatas->id) }}" method="post" class="row" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-10 py-2 px-2">
                                <div class="row px-2 py-2">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Name:</label>
                                        <input type="text" class="form-control" placeholder="Ex, item name" name="itemDescription"  value="{{ $selectDatas->item_name }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Price Per Unit:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465" name="itemPricePerUnit" value="{{ $selectDatas->ratePerUnit}}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quantity:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465" name="itemQuantity" value="{{ $selectDatas->item_qtv }}">
                                    </div>
                                </div>
                                {{--  --}}
                                @if (empty($selectDatas->size))
                                    
                                @else
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sizes:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 2mm" name="itemSizes" value="{{ $selectDatas->size}}">
                                    </div>
                                </div>
                                @endif
                                
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Batch Number:</label>
                                        <input type="text" class="form-control" placeholder="Ex, abc123" name="itemBatchNo" value="{{ $selectDatas->item_batchNo }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Expire Date:</label>
                                        <input type="date" class="form-control" placeholder="Ex, 0000 00 00" name="itemExpDate" value="{{ $selectDatas->item_expDate }}">
                                    </div>
                                </div>
                                {{--  --}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const itemPricePerUnitInput = document.querySelector('input[name="itemPricePerUnit"]');
                                        const itemQuantityInput = document.querySelector('input[name="itemQuantity"]');
                                        const itemTotalPriceInput = document.querySelector('input[name="itemTotalPrice"]');
                                        
                                        itemPricePerUnitInput.addEventListener('input', function() {
                                            calculateTotalPrice();
                                        });
                                        
                                        itemQuantityInput.addEventListener('input', function() {
                                            calculateTotalPrice();
                                        });
                                        
                                        function calculateTotalPrice() {
                                            const pricePerUnit = parseFloat(itemPricePerUnitInput.value) || 0;
                                            const quantity = parseFloat(itemQuantityInput.value) || 0;
                                            const totalPrice = pricePerUnit * quantity;
                                            
                                            itemTotalPriceInput.value = totalPrice.toFixed(2);
                                        }
                                    });
                                </script>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 123465" name="itemTotalPrice">
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </form>
                    @else
                        @if (!empty($selectDatas->item_companyname))
                            <form action="{{ route('updateOperationStockOtherData',$selectDatas->id) }}" method="post" class="row" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-10 py-2 px-2">
                                    <div class="row px-2 py-2">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Description:</label>
                                            <input type="text" class="form-control" placeholder="Ex, Washer , Light source" name="itemDetails" value="{{ $selectDatas->item_name }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Price Per Unit:</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465" name="itemPricePerUnit" value="{{ $selectDatas->ratePerUnit }}">
                                        </div>
                                    </div>
                                    
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quantity:</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465" name="itemQuantity" value="{{ $selectDatas->item_qtv }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Serial Number:</label>
                                            <input type="text" class="form-control" placeholder="Ex, 12345678" name="itemSerialNo" value="{{ $selectDatas->item_srno }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Model Number:</label>
                                            <input type="text" class="form-control" placeholder="Ex, cf-140L" name="itemModel" value="{{ $selectDatas->item_model }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    
                                    {{--  --}}
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company Name:</label>
                                            <input type="text" class="form-control" placeholder="Ex, demo company" name="itemCompanyName" value="{{ $selectDatas->item_companyname }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const itemPricePerUnitInput = document.querySelector('input[name="itemPricePerUnit"]');
                                            const itemQuantityInput = document.querySelector('input[name="itemQuantity"]');
                                            const itemTotalPriceInput = document.querySelector('input[name="itemTotalPrice"]');
                                
                                            itemPricePerUnitInput.addEventListener('input', function() {
                                                calculateTotalPrice();
                                            });
                                
                                            itemQuantityInput.addEventListener('input', function() {
                                                calculateTotalPrice();
                                            });
                                
                                            function calculateTotalPrice() {
                                                const pricePerUnit = parseFloat(itemPricePerUnitInput.value) || 0;
                                                const quantity = parseFloat(itemQuantityInput.value) || 0;
                                                const totalPrice = pricePerUnit * quantity;
                                    
                                                itemTotalPriceInput.value = totalPrice.toFixed(2);
                                            }
                                        });
                                    </script>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465" name="itemTotalPrice">
                                        </div>
                                    </div>
                                    {{--  --}}
                                </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('updateOperationStockScopesPartsData',$selectDatas->id) }}" method="post" class="row" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-10 py-2 px-2">
                                    <div class="row px-2 py-2">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-start py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Item Description:</label>
                                            <textarea name="itemDescription" id="itemDescription" cols="30" rows="3" class="form-control" placeholder="Ex, demo items">{{ $selectDatas->item_name }}</textarea>
                                        </div>
                                    </div>
                                    {{--  --}}
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Price Per Unit:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123465" name="itemPricePerUnit"  value="{{ $selectDatas->ratePerUnit }}">
                            </div>
                        </div>
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Quantity:</label>
                                            <input type="text" class="form-control" placeholder="Ex, 123465" name="itemQuantity" name="itemDetails" value="{{ $selectDatas->item_qtv }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                                    @if (empty($selectDatas->size))
                                        
                                    @else
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Sizes:</label>
                                            <input type="text" class="form-control" placeholder="Ex, 2mm" name="itemSizes" name="itemDetails" value="{{ $selectDatas->size }}">
                                        </div>
                                    </div>
                                    @endif
                                    {{--  --}}
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center align-items-center py-2">
                                            <label class="text-end mx-2 mt-1" for="" style="width:300px;">Company Name:</label>
                                            <input type="text" class="form-control" placeholder="Ex, demo company" name="itemCompanyPartName" value="{{ $selectDatas->part_companyname }}">
                                        </div>
                                    </div>
                                    {{--  --}}
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const itemPricePerUnitInput = document.querySelector('input[name="itemPricePerUnit"]');
                                const itemQuantityInput = document.querySelector('input[name="itemQuantity"]');
                                const itemTotalPriceInput = document.querySelector('input[name="itemTotalPrice"]');
                                
                                itemPricePerUnitInput.addEventListener('input', function() {
                                    calculateTotalPrice();
                                });
                                
                                itemQuantityInput.addEventListener('input', function() {
                                    calculateTotalPrice();
                                });
                                
                                function calculateTotalPrice() {
                                    const pricePerUnit = parseFloat(itemPricePerUnitInput.value) || 0;
                                    const quantity = parseFloat(itemQuantityInput.value) || 0;
                                    const totalPrice = pricePerUnit * quantity;
                                    
                                    itemTotalPriceInput.value = totalPrice.toFixed(2);
                                }
                            });
                        </script>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Total Amount:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123465" name="itemTotalPrice">
                            </div>
                        </div>
                        {{--  --}}
                                </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                </div>
                            </form>
                        @endif
                    @endif
                @endif
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