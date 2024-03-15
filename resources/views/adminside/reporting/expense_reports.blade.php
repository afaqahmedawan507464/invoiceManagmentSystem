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
    <title> Scope Visions | New Attendance Form</title>
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
                            <h2 class="text-end">Expense Details Reports</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ps-lg-2 mb-3">
                            <div>
                              <div class="card-header">
                                <form action="{{ route('getDataForMonthWiseExpenseReport') }}" method="post" class="d-flex justify-content-end align-items-center">
                                  @csrf
                                  <div>
                                    <select class="form-control" name="searchByMonth">
                                        <option value="">Select Month And Year</option>
                                        
                                      @php
                                          $prevMonth = '';
                                      @endphp
                                      @if(isset($expense))
                                          @foreach ($expense as $selectExpenses)
                                              @php
                                                  $currentMonth = \Carbon\Carbon::parse($selectExpenses->expense_date)->format('M,Y');
                                              @endphp
                                              @if($currentMonth != $prevMonth)
                                                  <option value="{{ $selectExpenses->expense_date }}">{{ $currentMonth }}</option>
                                              @endif
                                              @php
                                                  $prevMonth = $currentMonth;
                                              @endphp
                                          @endforeach
                                      @endif

                                      </select>
                                  </div>
                                   <button class="btn btn-outline-primary mx-3" type="submit">Search</button>
                                  </div>
                                </form>
                              </div>
                              <div class="card-body h-100 pe-0">
                                <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
                                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
                                <canvas id="myChart" style="width:100%"></canvas>
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/themes/public/vendors/popper/popper.min.js"></script>
    <script src="/themes/public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/themes/public/vendors/anchorjs/anchor.min.js"></script>
    <script src="/themes/public/vendors/is/is.min.js"></script>
    {{-- <script src="/themes/public/vendors/echarts/echarts.min.js"></script> --}}
    <script src="/themes/public/vendors/prism/prism.js"></script>
    <script src="/themes/public/vendors/fontawesome/all.min.js"></script>
    <script src="/themes/public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/themes/public/vendors/list.js/list.min.js"></script>
    <script src="/themes/public/assets/js/theme.js"></script>
    <script src="/jquery-3.7.1.min.js"></script>
    <script src="/themes/public/vendors/chart/chart.min.js"></script>
    <script src="/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        var expense ={!! $selectExpense !!}
        
        const expenseDate = [];
        const expensePayment = [];
        @if ($selectExpense->isEmpty())
            // Handle empty selectExpense
        @else
            @foreach ($selectExpense  as $selectExpenses)
                expenseDate.push({{ \Carbon\Carbon::parse($selectExpenses->expense_date)->format('d') }});
                
                // expensePayment.push($selectExpenses->total_use_amount);
            @endforeach
        @endif
        const usePayment = [];
        @if ($selectExpense->isEmpty())
            // Handle empty selectExpense
        @else
            @foreach ($selectExpense as $selectExpenses)
                usePayment.push({{ $selectExpenses->total_use_amount }});
            @endforeach
        @endif
        const maxAmount = Math.max(...expense.map(expense => expense.total_use_amount));
        const minAmount = Math.min(...expense.map(expense => expense.total_use_amount));
        console.log(usePayment);
        const xValues = expenseDate;
        const yValues = usePayment;
        // const barColors = ["black"];
        new Chart("myChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              fill: false,
              lineTension: 0,
              // backgroundColor: barColors,
              borderColor: "primary",
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            scales: {
              yAxes: [{ticks: {min: 0, max:maxAmount}}],
            }
          }
        });
        
        </script>
</body>
</html>