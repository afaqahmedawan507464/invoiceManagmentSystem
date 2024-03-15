<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Scope Visions</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    {{-- <link rel="apple-touch-icon" sizes="500x500" href="/logo.jpg">
    <link rel="icon" type="image/jpg" sizes="100x100" href="/logo.jpg">
    <link rel="icon" type="image/jpg" sizes="50x50" href="/logo.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="/logo.jpg">
    <link rel="manifest" href="/themes/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/logo.jpg"> --}}
    <meta name="theme-color" content="#ffffff">
    <script src="/themes/public/assets/js/config.js"></script>
    <script src="/themes/public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="index.html">
              <div class="d-flex align-items-center py-3"><span class="font-sans-serif">Scope Vision</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Reports</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard">
                    <li class="nav-item"><a class="nav-link" href="{{ route('viewStockDetailsPage') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Stocks</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('reportMonthlyExpenseReportingSystem') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Expenses</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="{{ route('reportMonthBankStatementReportingSystem') }}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bank Statement</span>
                    </div>
                  </a> --}}
                  <!-- more inner pages-->
                {{-- </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reportClientReportingSystem') }}" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Clients</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li> --}}
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-check"></span></span><span class="nav-link-text ps-1">Attendance</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard">
                    <li class="nav-item"><a class="nav-link" href="{{ route('attendanceList') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Attendance List</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    {{--  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('leaveListPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Leave List</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  {{--  --}}
                  <li class="nav-item"><a class="nav-link" href="{{ route('allLeaveListPage') }}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Request Leave List</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard15" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard15">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-home"></span></span><span class="nav-link-text ps-1">Company</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard15">
                    <li class="nav-item"><a class="nav-link" href="{{ route('companyNameList') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Company List</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard17" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard17">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Employee</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard17">
                    <li class="nav-item"><a class="nav-link" href="{{ route('employeeNameList') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Employee List</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard16" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard16">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Clients</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard16">
                    <li class="nav-item"><a class="nav-link" href="{{ route('clientNameList') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Clients List</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-box"></span></span><span class="nav-link-text ps-1">Stock Managment</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard">
                    <li class="nav-item"><a class="nav-link" href="{{ route('disposibleItemsListPage') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Stock Disposible Items List</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('partListPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Stock Scope Parts And Others List</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard1" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard1">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-truck-loading"></span></span><span class="nav-link-text ps-1">Delivery Challan</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard1">
                    <li class="nav-item"><a class="nav-link" href="{{ route('deliveryChallanListPage') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Delivery Challan List</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard2" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard2">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-wallet"></span></span><span class="nav-link-text ps-1">Expenses Details</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('detailExpensesBanksPage') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bank Payment Details</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  {{--  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('createExpensesBankPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add Bank Details</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                    {{--  --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('detailExpensesPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Office Expenses Details</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  {{--  --}}
                  <li class="nav-item"><a class="nav-link" href="{{ route('createExpensesPage') }}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add Office Expenses</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>
                  {{--  --}}
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard3" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard3">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Incoming / Outgoing Daily Record</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('incomingAndOutGoingDailyRecordList') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Incoming And Outgoing Daily Report Scopes</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('IncomingAndOutgoingDataDailyRecordList') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Incoming And Outgoing Daily Record</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard4" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard4">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-wrench"></span></span><span class="nav-link-text ps-1">Inspection Reports</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard4">
                    <li class="nav-item"><a class="nav-link" href="{{ route('withoutTjfInspectionIncomingListPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Incoming Report List</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('withoutTjfInspectionOutgoingListPage') }}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Outgoing Report List</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                   </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard7" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard7">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file-invoice"></span></span><span class="nav-link-text ps-1">Invoices</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard7">
                    <li class="nav-item"><a class="nav-link" href="{{ route('invoiceListPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logo Invoice List</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('invoiceListWithOutLogoPage') }}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice List</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard10" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard10">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-quote-left"></span></span><span class="nav-link-text ps-1">Quotations</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard10">
                    <li class="nav-item"><a class="nav-link" href="{{ route('quotationListPage') }}" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logo Quotation List</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('quotationListWithOutLogoPage') }}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Quotation List</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>
                    {{--  --}}
                  </ul>
                </li>
                {{--  --}}
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard13" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard13">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file"></span></span><span class="nav-link-text ps-1">Service Reports</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard13">
                    <li class="nav-item"><a class="nav-link" href="{{ route('serviceReportListPage') }}" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Service Report</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                {{--  --}}
                
              </ul>
            </div>
          </div>
        </nav>
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="">
              <div class="d-flex align-items-center"><span class="font-sans-serif">Scope Vision</span>
              </div>
            </a>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
              <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>

              </li> --}}
              <li class="nav-item dropdown">
                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">{{ $notificationCount }}</span></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto py-2">
                          <h6 class="card-header-title mb-0 fs-2">Notifications ( {{ $notificationCount }} )</h6>
                        </div>
                      </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs--1">
                        @if ($notifications->isEmpty())
                            <p class="text-danger text-center">No Notifications</p>
                        @else
                           @foreach ($notifications as $item)
                           @if ($item->read_status == 1)
                           <div class="list-group-item">
                            <div class="notification notification-flush">
                              <div class="notification-body">
                                <p class="mb-1">{{ $item->message }}.</p>
                                <span class="notification-time">{{ $item->relative_time }}</span>
                              </div>
                            </div>
                          </div>
                           @else
                           <div class="list-group-item">
                            <a class="notification notification-flush notification-unread" href="{{ route('notificationReadStatus',$item) }}">
                              <div class="notification-body">
                                <p class="mb-1">{{ $item->message }}.</p>
                                <span class="notification-time">{{ $item->relative_time }}</span>
                              </div>
                            </a>
                          </div>
                           @endif

                           @endforeach
                        @endif

                      </div>
                    </div>
                  </div>
                </div>

              </li>
              <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (empty(Auth::guard('admin')->user()->user_image))
                        <div class="avatar avatar-xl">
                          <img class="rounded-circle" src="/avator.jpg" alt="" />
      
                        </div>
                        @else
                        <div class="avatar avatar-xl">
                          <img class="rounded-circle" src="{{Auth::guard('admin')->user()->user_image}}" alt="" />
      
                        </div>
                        @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item" href="{{ route('createAdminProfilePage') }}">Profile &amp; account</a>
                    <a class="dropdown-item" href="{{ route('logoutOperation') }}">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
          {{-- Dynamic Data  --}}
            @yield('adminDashboard')
          {{-- Dynamic Data  --}}
          <footer class="footer">
            <div class="row g-0 justify-content-between fs--2 mt-4 mb-3">
              <div class="col-12 text-center">
                <p class="mb-0 text-500">Software Design By Al-Muflihoon Solution <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> Contact : +923035568729 , +923118797784 | </span><span class="d-none d-sm-inline-block"> </span><br class="d-sm-none" /> EmailAddress : afaq.ahmed.awan729@gmail.com </p>
              </div>
              <div class="col-12 text-center">
                <p class="mb-0 text-500"></span><br class="d-sm-none" /> &copy; Copyright Scope Visions</span>  | <span class="d-none d-sm-inline-block">v0.0.0.1</span></p>
              </div>
            </div>
          </footer>
        </div>
        {{-- <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                  <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-name">Name</label>
                    <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-email">Email address</label>
                    <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                  </div>
                  <div class="row gx-2">
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-password">Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                  </div>
                </form>
                <div class="position-relative mt-5">
                  <hr class="bg-300" />
                  <div class="divider-content-center">or register with</div>
                </div>
                <div class="row g-2 mt-2">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header settings-panel-header bg-shape">
        <div class="z-index-1 py-1 light">
          <h5 class="text-white"> <span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
          <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
        </div>
        <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
        <h5 class="fs-0">Color Scheme</h5>
        <p class="fs--1">Choose the perfect color mode for your app.</p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/themes/public/assets/img/generic/falcon-mode-default.jpg" alt=""/></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="/themes/public/assets/img/generic/falcon-mode-dark.jpg" alt=""/></span><span class="label-text"> Dark</span></label>
            </div>
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="/themes/public/assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">RTL Mode</h5>
              <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1" href="documentation/customization/configuration.html">RTL Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="/themes/public/assets/img/icons/arrows-h.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">Fluid Layout</h5>
              <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1" href="documentation/customization/configuration.html">Fluid Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
          </div>
        </div>
      </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
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
    
  </body>

</html>