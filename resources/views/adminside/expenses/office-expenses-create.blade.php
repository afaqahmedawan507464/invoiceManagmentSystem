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
    <title>Scope Visions | New Office Expenses </title>
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
                            <a href="{{ route('adminDashboardPage') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
                        </div>
                        <div class="col-6">
                            <h4 class="text-end">Office Expenses</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('createExpensesOperation') }}" method="post" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-10 py-2 px-2">
                        {{--  --}}
                        <div class="row px-2 py-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Date:</label>
                                <input type="date" class="form-control" placeholder="Ex, 12-12-0000" name="expenseDate">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-center align-items-center py-2">
                                <label class="text-end mx-2 mt-1" for="" style="width:300px;">Patti cash:</label>
                                <input type="text" class="form-control" placeholder="Ex, 123" name="patticashAmount">
                            </div>
                        </div>
                        {{--  --}}
                        </div>
                        {{--  --}}
                        <div id="add_form">
                            <div id="show_items13">
                            <div class="row px-2 py-2">
                                <div class="col-12 py-2">
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <button class="btn btn-outline-primary add_item_btn13"><i class="mx-2 fas fa-plus"></i>Add More</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Expense Type:</label>
                                        <select name="expenseType[]" id="expenseType" class="form-control">
                                            <option value="">Select Expense Category</option>
                                            <option value="1">Utilities Expense</option>
                                            <option value="2">Travel Expense</option>
                                            <option value="3">Shippment Expense</option>
                                            <option value="4">Office Expense</option>
                                            <option value="5">Utilities Expense</option>
                                            <option value="6">Salaries Expense</option>
                                            <option value="7">Office Rent</option>
                                            <option value="8">MD Expense</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Amount:</label>
                                        <input type="text" class="form-control" placeholder="Ex, 132" name="expenseAmount[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Payment Type:</label>
                                        <select name="expensePaymentType[]" id="expensePaymentType" class="form-control">
                                            <option value="">Select Payment Type</option>
                                            <option value="1">Cash Payment</option>
                                            <option value="2">Online Payment</option>
                                        </select>
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-center py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Voucher Number:</label>
                                        <input type="text" class="form-control" placeholder="Ex, abc123" name="expenseVoucherNumber[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-center align-items-start py-2">
                                        <label class="text-end mx-2 mt-1" for="" style="width:300px;">Details:</label>
                                        <textarea name="expenseDetails[]" id="expenseDetails" cols="30" rows="3" placeholder="Ex, demo details" class="form-control"></textarea>
                                    </div>
                                </div>
                                {{--  --}}
                            </div>
                            </div>
                        </div>
                        {{--  --}}
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
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