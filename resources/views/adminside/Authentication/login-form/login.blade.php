<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Scope Visions | Login Form</title>


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
    <script src="/custom-js/custom-js.js"></script>


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
        <div class="row min-vh-100 bg-100">
          <div class="col-6 d-none d-lg-block position-relative">
            <div class="bg-holder" style="background-image:url(/scopeImage.jpg);background-position: 50% 20%;">
            </div>
            <!--/.bg-holder-->

          </div>
          <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
            <div class="row justify-content-center g-0">
              <div class="col-lg-9 col-xl-8 col-xxl-6">
                @if (Session::has('error_message'))

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Error</strong> {{ Session::get('error_message'); }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>

         @endif
         @if (Session::has('success_message'))

         <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success:</strong> {{ Session::get('success_message'); }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>

         @endif
         @if ($errors->any())
         <div class="alert alert-danger alert-dismissible fade show px-4" role="alert">
               @foreach ($errors->all() as $item)
                 <li style="list-style: none">{{ $item }}</li>
               @endforeach
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
          @endif
                <div class="card">
                  @if ($selectCompany->isEmpty())
                
                 @else
                 @foreach ($selectCompany as $selectCompanys)
                    
                 @endforeach
                  <div class="card-header bg-circle-shape bg-shape text-center p-2"><p class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light">{{ $selectCompanys->company_name }}</p></div>
                 @endif
                  <div class="card-body p-4">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h2>Login</h2>
                      </div>
                      {{-- <div class="col-auto fs--1 text-600"><span class="mb-0 fw-semi-bold">New User?</span> <span><a href="../../../pages/authentication/split/register.html">Create account</a></span></div> --}}
                    </div>
                    <form method="post" action="{{ route('loginOperation') }}">
                      @csrf
                      <div class="mb-3">
                        <label class="form-label" for="split-login-email">Email address</label>
                        <input class="form-control" type="email" placeholder="Email address" name="loginEmailaddress" id="loginEmailaddress"/>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between">
                          <label class="form-label" for="split-login-password">Password</label>
                        </div>
                        <input class="form-control" type="password" placeholder="Password" name="password" id="loginPassword"/>
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit">Log in</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
                {{-- <footer class="footer"> --}}
                  <div class="row g-0 justify-content-between fs--2 mt-4 mb-3">
                    <div class="col-12 text-center">
                      <p class="mb-0 text-500">Software Design By Al-Muflihoon Solution <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> Contact : +923035568729 , +923118797784 | </span><span class="d-none d-sm-inline-block"> </span><br class="d-sm-none" /> EmailAddress : afaq.ahmed.awan729@gmail.com </p>
                    </div>
                    <div class="col-12 text-center">
                      <p class="mb-0 text-500"></span><br class="d-sm-none" /> &copy; Copyright Scope Visions</span>  | <span class="d-none d-sm-inline-block">v0.0.0.1</span></p>
                    </div>
                  </div>
                {{-- </footer> --}}
              </div>
            </div>
          </div>
        </div>
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
            <div class="d-flex align-items-start"><img class="me-2" src="assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
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
            <div class="d-flex align-items-start"><img class="me-2" src="assets/img/icons/arrows-h.svg" width="20" alt="" />
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