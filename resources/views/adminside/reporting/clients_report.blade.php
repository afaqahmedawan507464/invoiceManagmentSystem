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
                            <h2 class="text-end">Client Work Details</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <canvas class="max-w-100 max-h-100" id="myChart" width="350"></canvas>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var clients ={!! $selectClients !!};
        var clientsName = [];
        $.each(clients,function(key,val){
            clientsName.push(val.client_name);
        });
        console.log(clientsName);
        const uniData = clientsName;
        const uniqueClients = clients.filter((client, index) => {
            return clients.findIndex(c => c.client_name === client.client_name) === index;
        });
        const xValues = uniqueClients.map(client => client.client_name);
        const totalInvoices = clients.length;
        const invoicePercentages = uniqueClients.map(client => {
            const clientInvoices = clients.filter(c => c.client_name === client.client_name);
            const clientInvoiceCount = clientInvoices.length;
            return Math.round((clientInvoiceCount / totalInvoices) * 100);
        });
        const yValues = invoicePercentages;
        const barColors = [
            "#808080",
          "#FF00FF",
          "#000000",
          "#C0C0C0",
          "#800000",
          "#FF0000",
          "#800080",
          "#008000",
          "#00FF00",
          "#808000",
          "#FFFF00",
          "#000080",
          "#0000FF",
          "#008080",
          "#00FFFF",
          "#f0f8ff",
          "#faebd7",
          "#00ffff",
          "#7fffd4",
          "#f0ffff",
          "#f0ffff",
          "#f5f5dc",
          "#ffe4c4",
          "#000000",
          "#0000ff",
          "#8a2be2",
          "#a52a2a",
          "#deb887",
          "#deb887",
          "#5f9ea0",
          "#7fff00",
          "#d2691e",
          "#ff7f50",
          "#6495ed",
          "#fff8dc",
        ];
        
        new Chart("myChart", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
        });
    </script>

                            
</body>
</html>