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
    <title>Scope Visions | Detail Employee</title>
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
        <div>
            <div class="pt-2">
                <a href="{{ route('employeeList') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left me-2"></i>Back</a>
            </div>
            @foreach ($selectEmployee as $selectEmployees)
                
            @endforeach
            <div>
                <div class="row pt-3">
                    <div class="col-lg-4">
                        <div class="col-12">
                        <div class="card px-3 py-3">
                        <div class="d-flex justify-content-center align-items-center py-2">
                            @if (!empty($selectEmployees->user_image))
                            <img src="{{ $selectEmployees->user_image }}" alt="" style="width: 200px;height:200px;border-radius:50%;">
                            @else
                            <img src="/avator.jpg" alt="" style="width: 200px;height:200px;border-radius:50%;">
                            @endif
                        </div>
                        <h5 class="text-center">{{ $selectEmployees->employeename }}</h5>
                        @if ( $selectEmployees->user_type == 'service eng' )
                        <span class="text-secondary text-center" style="font-size:15px;">Service Engineer</span>
                        @elseif( $selectEmployees->user_type == 'manager' )
                        <span class="text-secondary text-center" style="font-size:15px;">Manager</span>
                        @elseif( $selectEmployees->user_type == 'helper' )
                        <span class="text-secondary text-center" style="font-size:15px;">Helper</span>
                        @else
                        <span class="text-secondary text-center" style="font-size:15px;">Computer Operator</span>
                        @endif
                    </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="card px-3 py-3">
                            @if ($selectSocials->isEmpty())
                                <p class="text-center text-danger">Not Data Founded</p>
                            @else
                                @foreach ($selectSocials as $selectSocialss)
                                @if(!empty($selectSocialss->facebook_account))
                                <div class="d-flex justify-content-start align-items-center py-1">
                                    <i class="fab fa-facebook mx-3" style="font-size:25px;"></i>
                                    <span style="font-size: 13px;">{{ $selectSocialss->facebook_account }}</span>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                @endif
                                @if(!empty($selectSocialss->google_account))
                                <div class="d-flex justify-content-start align-items-center py-1">
                                    <i class="fab fa-google mx-3" style="font-size:25px;"></i>
                                    <span style="font-size: 13px;">{{ $selectSocialss->google_account }}</span>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                @endif
                                @if(!empty($selectSocialss->instagram_account))
                                <div class="d-flex justify-content-start align-items-center py-1">
                                    <i class="fab fa-linkedin mx-3" style="font-size:25px;"></i>
                                    <span style="font-size: 13px;">{{ $selectSocialss->instagram_account }}</span>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                @endif
                                @if(!empty($selectSocialss->twitter_account))
                                <div class="d-flex justify-content-start align-items-center py-1">
                                    <i class="fab fa-twitter mx-3" style="font-size:25px;"></i>
                                    <span style="font-size: 13px;">{{ $selectSocialss->twitter_account }}</span>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                @endif
                                @if(!empty($selectSocialss->yahoo_account))
                                <div class="d-flex justify-content-start align-items-center py-1">
                                    <i class="fab fa-yahoo mx-3" style="font-size:25px;"></i>
                                    <span style="font-size: 13px;">{{ $selectSocialss->yahoo_account }}</span>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                @endif
                                @if(!empty($selectSocialss->skype_account))
                                <div class="d-flex justify-content-start align-items-center py-1">
                                    <i class="fab fa-skype mx-3" style="font-size:25px;"></i>
                                    <span style="font-size: 13px;">{{ $selectSocialss->skype_account }}</span>
                                </div>
                                @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <br>
                    </div>
                    <div class="col-lg-8">
                        <div class="card px-3 py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Employee Name:</span>
                                        <span class="mx-2">{{ $selectEmployees->employeename }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Designation:</span>
                                        @if ( $selectEmployees->user_type == 'service eng' )
                                        <span class="mx-2">Service Engineer</span>
                                        @elseif( $selectEmployees->user_type == 'manager' )
                                        <span class="mx-2">Manager</span>
                                        @elseif( $selectEmployees->user_type == 'helper' )
                                        <span class="mx-2">Helper</span>
                                        @else
                                        <span class="mx-2">Computer Operator</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Email Address:</span>
                                        <span class="mx-2">{{ $selectEmployees->email_address }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Account Status:</span>
                                        @if( $selectEmployees->active_status = 1 )
                                        <span class="mx-2">Activate</span>
                                        @else
                                        <span class="mx-2">Deactivate</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Office Number:</span>
                                        <span class="mx-2">{{ $selectEmployees->office_number }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Mobile Number:</span>
                                        <span class="mx-2">{{ $selectEmployees->mobile_number }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Gender:</span>
                                        @if( $selectEmployees->salutation == 'male' )
                                        <span class="mx-2">Male</span>
                                        @else
                                        <span class="mx-2">Female</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Birth Date:</span>
                                        <span class="mx-2">{{ \Carbon\Carbon::parse($selectEmployees->date_of_birth)->format('M,d Y') }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Nationality:</span>
                                        @if( $selectEmployees->nationality == 'pakistan' )
                                        <span class="mx-2">Pakistan</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Cnic Number:</span>
                                        <span class="mx-2">{{ $selectEmployees->cnic_number }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Marred Status:</span>
                                        @if( $selectEmployees->marred_status == 'married' )
                                        <span class="mx-2">Married</span>
                                        @else
                                        <span class="mx-2">Single</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Blood Group:</span>
                                        @if( $selectEmployees->blood_group == 'a+' )
                                        <span class="mx-2">A+</span>
                                        @elseif( $selectEmployees->blood_group == 'a-' )
                                        <span class="mx-2">A-</span>
                                        @elseif( $selectEmployees->blood_group == 'b+' )
                                        <span class="mx-2">B+</span>
                                        @elseif( $selectEmployees->blood_group == 'b-' )
                                        <span class="mx-2">B-</span>
                                        @elseif( $selectEmployees->blood_group == 'o-' )
                                        <span class="mx-2">O-</span>
                                        @else
                                        <span class="mx-2">O+</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>S/O:</span>
                                        <span class="mx-2">{{ $selectEmployees->father_name }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>City:</span>
                                        <span class="mx-2">{{ $selectEmployees->city }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Province:</span>
                                        <span class="mx-2">{{ $selectEmployees->province }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Address:</span>
                                        <span class="mx-2">{{ $selectEmployees->address }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Postal Code:</span>
                                        <span class="mx-2">{{ $selectEmployees->postal_code }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Emergency Person Contact:</span>
                                        <span class="mx-2">{{ $selectEmployees->emergency_contact_person }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Emergency Contact:</span>
                                        <span class="mx-2">{{ $selectEmployees->contact_number }}</span>
                                    </div>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Emergency Person Relationship:</span>
                                        <span class="mx-2">{{ $selectEmployees->relationship }}</span>
                                    </div>
                                </div>
                                <div class="border-dashed-bottom my-1"></div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-start align-items-center py-1">
                                        <span>Place Of Birthdate:</span>
                                        <span class="mx-2">{{ $selectEmployees->place_of_birth }}</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        @if ($educations->isEmpty())
                        @else
                        <div class="card px-3 py-3">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th style="width:33%;text-align:center;">Degree</th>
                                            <th style="width:33%;text-align:center;">Institute</th>
                                            <th style="width:33%;text-align:center;">Education Type</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educations as $educationss)
                                            <tr>
                                                <td style="width:33%;text-align:center;">{{ $educationss->degree }}</td>
                                                <td style="width:33%;text-align:center;">{{ $educationss->subject }}</td>
                                                <td style="width:33%;text-align:center;">{{ $educationss->qualification_mode }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                            </div>
                        </div>
                        @endif
                        <br>
                        @if ($educationsAdditional->isEmpty())
                        @else
                        <div class="card px-3 py-3">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th style="width:33%;text-align:center;">Degree</th>
                                            <th style="width:33%;text-align:center;">Institute</th>
                                            <th style="width:33%;text-align:center;">Education Type</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($educationsAdditional as $educationss)
                                            <tr>
                                                <td style="width:33%;text-align:center;">{{ $educationss->degree }}</td>
                                                <td style="width:33%;text-align:center;">{{ $educationss->subject }}</td>
                                                <td style="width:33%;text-align:center;">{{ $educationss->qualification_mode }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                </div>
                                {{-- <div class="border-dashed-bottom my-1"></div> --}}
                            </div>
                        </div>
                        @endif
                    </div>
                    
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
    <script src="/custom.js"></script>
</body>
</html>