@extends('adminside.layout.layout');
@section('adminDashboard')
<h3 class="pb-3" style="text-transform: capitize">Welcome Mrs, {{ Auth::guard('admin')->user()->adminname }}</h3>
<div class="row px-3 pt-2">
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-users" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Employees </h5>
                        <h5 class="mx-1"> ( {{ $selectTotalEmployees }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-home" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Company </h5>
                        <h5 class="mx-1"> ( {{ $companyCount }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-envelope" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Leaves </h5>
                        <h5 class="mx-1"> ( {{ $totalLeaveData }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-users" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Clients </h5>
                        <h5 class="mx-1"> ( {{ $selectTotalClients }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-file-invoice" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Invoices </h5>
                        <h5 class="mx-1"> ( {{ $countInvoices }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-quote-left" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Quotations </h5>
                        <h5 class="mx-1"> ( {{ $countQuotation }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-envelope-open" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Delivery Challans </h5>
                        <h5 class="mx-1"> ( {{ $countDeleiveryChallan }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
    <div class="col-lg-6 my-2">
        {{-- <a href="" class="text-black" style="text-decoration: none"> --}}
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <span class="mx-2 mb-1"><i class="fas fa-file" style="font-size: 30px;"></i></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <h5>Service Reports </h5>
                        <h5 class="mx-1"> ( {{ $serviceReport }} ) </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- </a> --}}
    </div>
</div>
<div class="row px-3 pt-2">
    <div class="col-lg-6 my-2">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Recent Activities</h5>
                <div class="scrollbar-overlay p-3" style="max-height:15rem">
                    @if ($notifications->isEmpty())
                    <p class="text-danger text-center">Not Data Founded</p>
                    @else
                        @foreach ($notifications as $notificationss)
                        <div class="d-flex justify-content-start align-items-center w-100">
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <span>{{ $notificationss->message }}</span>
                                <span class="text-secondary"> {{ $notificationss->relative_time }}</span> 
                            </div>
                        </div> 
                        <div class="border-dashed-bottom my-1"></div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 my-2">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Active Employees</h5>
                <div class="scrollbar-overlay p-3" style="max-height:15rem">
                @if ($selectEmployees->isEmpty())
                <p class="text-danger text-center">Not Data Founded</p>
                @else
                    @foreach ($selectEmployees as $selectEmployeesz)
                    <div class="d-flex justify-content-start align-items-center">
                        @if (empty($selectEmployeesz->user_image))
                        <div style="width:40px;height:40px;border-radius:50%;">
                            <img src="/avator.jpg" alt="" style="width:100%;height:100%;border-radius:50%;">
                         </div>
                        @else
                        <div style="width:40px;height:40px;border-radius:50%;">
                            <img src="{{ $selectEmployeesz->user_image }}" alt="" style="width:100%;height:100%;border-radius:50%;">
                         </div>
                        @endif
                        <div class="mx-2">
                            {{ $selectEmployeesz->employeename }}
                        </div>
                    </div> 
                    <div class="border-dashed-bottom my-1"></div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 my-2">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Present Employees</h5>
                <div class="scrollbar-overlay p-3" style="max-height:15rem">
                @if ($activeEmployees->isEmpty())
                <p class="text-danger text-center">Not Data Founded</p>
                @else
                    @foreach ($activeEmployees as $selectEmployeesz)
                    <div class="d-flex justify-content-start align-items-center">
                        @if (empty($selectEmployeesz->user_image))
                        <div style="width:40px;height:40px;border-radius:50%;">
                            <img src="/avator.jpg" alt="" style="width:100%;height:100%;border-radius:50%;">
                         </div>
                        @else
                        <div style="width:40px;height:40px;border-radius:50%;">
                            <img src="{{ $selectEmployeesz->user_image }}" alt="" style="width:100%;height:100%;border-radius:50%;">
                         </div>
                        @endif
                        <div class="mx-2">
                            {{ $selectEmployeesz->employeename }}
                        </div>
                    </div> 
                    <div class="border-dashed-bottom my-1"></div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 my-2">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Absent Employees</h5>
                <div class="scrollbar-overlay p-3" style="max-height:15rem">
                @if ($deactiveEmployees->isEmpty())
                <p class="text-danger text-center">Not Data Founded</p>
                @else
                    @foreach ($deactiveEmployees as $selectEmployeesz)
                    <div class="d-flex justify-content-start align-items-center">
                        @if (empty($selectEmployeesz->user_image))
                        <div style="width:40px;height:40px;border-radius:50%;">
                            <img src="/avator.jpg" alt="" style="width:100%;height:100%;border-radius:50%;">
                         </div>
                        @else
                        <div style="width:40px;height:40px;border-radius:50%;">
                            <img src="{{ $selectEmployeesz->user_image }}" alt="" style="width:100%;height:100%;border-radius:50%;">
                         </div>
                        @endif
                        <div class="mx-2">
                            {{ $selectEmployeesz->employeename }}
                        </div>
                    </div> 
                    <div class="border-dashed-bottom my-1"></div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
    
    
</div>

@endsection