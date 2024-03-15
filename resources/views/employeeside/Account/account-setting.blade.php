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
    <title>Company Creatiion Form</title>
</head>
<body>
    <div class="container mt-2">
        <div class="card">
            <div class="row">
                <div class="col-12">
                  <div class="card mb-3 btn-reveal-trigger">
                    <div class="card-header position-relative min-vh-25 mb-8">
                      <div class="cover-image">
                        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/themes/public/assets/img/generic/4.jpg);">
                        </div>
                        <!--/.bg-holder-->
    
                        {{-- <input class="d-none" id="upload-cover-image" type="file" />
                        <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label> --}}
                      </div>
                      <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                        @if (empty(Auth::guard('employee')->user()->user_image))
                        <div class="h-100 w-100 rounded-circle overflow-hidden"> <img src="/avator.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                        </div>
                        @else
                        <div class="h-100 w-100 rounded-circle overflow-hidden"> <img src="{{Auth::guard('employee')->user()->user_image}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
              <div class="row g-0">
                <div class="col-lg-8 pe-lg-2">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="mb-0">Profile Settings</h5>
                    </div>
                    @if ($createAdminProfileDetails->isEmpty())
                    <div class="card-body bg-light">
                        <form class="row g-3" method="post" action="{{ route('personalinformationAddOperation') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <label class="form-label" for="first-name">User Image</label>
                            <input class="form-control" type="file" name="userimage">
        
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="first-name">Employee Name</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}}">
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="last-name">Email Address</label>
                          <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{ Auth::guard('employee')->user()->employeeemailaddress }}{{old('emailaddress')}}" disabled >
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="first-name">Office Number</label>
                            <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Contact Number</label>
                            <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{old('mobilenumber')}}">
                        </div>
                        <br>
                        <div class="col-12"></div>
                        <div class="col-lg-6">
                            <label class="form-label" for="first-name">Gender</label>
                            <select name="salutions" id="salutions" class="form-control">
                                <option value="">Salutions</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Other</option>
                             </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Nationality</label>
                            <select name="nationality" id="nationality" class="form-control">
                                <option value="">Nationality</option>
                                <option value="pakistan">Pakistan</option>
                             </select>
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="first-name">Date of birth</label>
                              <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="last-name">Martrial Status</label>
                              <select name="matrialstatus" id="matrialstatus" class="form-control">
                                <option value="">Matrial Status</option>
                                <option value="married">Married</option>
                                <option value="single">Single</option>
                             </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Blood group</label>
                            <select name="bloodgroup" id="bloodgroup" class="form-control">
                                <option value="">Blood group</option>
                                <option value="a+">A+</option>
                                <option value="a-">A-</option>
                                <option value="b+">B+</option>
                                <option value="b-">B-</option>
                                <option value="o-">O-</option>
                                <option value="o+">O+</option>
                             </select>
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="first-name">Cnic Number</label>
                              <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}">
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="last-name">Father Name</label>
                              <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}">
                        </div>
                        <div class="col-12"></div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Address</label>
                            <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}"></div>
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="first-name">City</label>
                              <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}">
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="last-name">State/Province</label>
                              <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Postal code</label>
                            <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}">
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="first-name">Country</label>
                              <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}">
                        </div>
                        <div class="col-lg-6">
                              <label class="form-label" for="last-name">Phone Number</label>
                              <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}">
                        </div>
                        <div class="col-12"></div>
                        <div class="col-lg-6">
                            <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                            <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                            <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}">
                        </div>
                        <div class="col-lg-6">
                          <label class="form-label" for="last-name">Emergency Contact Number</label>
                          <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="first-name">Place Of birth</label>
                            <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Sub Department</label>
                            <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Resign Date</label>
                            <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}">
                        </div>
                        <div class="col-12"></div>
                        <div class="col-12 d-flex justify-content-end">
                          <button class="btn btn-primary" type="submit">Add Details</button>
                        </div>
                      </form>
                    </div>
                    @else
                        @foreach ($createAdminProfileDetails as $createAdminProfileDetail)
                        <div class="card-body bg-light">
                            <form class="row g-3" method="post" action="{{ route('editOperationPersonalInformation') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-12">
                                <label class="form-label" for="first-name">User Image</label>
                                <input class="form-control" type="file" name="userimage">
            
                            </div>
                            <div class="col-lg-6">
                              <label class="form-label" for="first-name">Employee Name</label>
                              <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}} {{ $createAdminProfileDetail->first_name }}">
                            </div>
                            <div class="col-lg-6">
                              <label class="form-label" for="last-name">Email Address</label>
                              <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{old('emailaddress')}}{{ $createAdminProfileDetail->email_address }}" disabled >
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="first-name">Office Number</label>
                                <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}{{ $createAdminProfileDetail->office_number }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Contact Number</label>
                                <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{old('mobilenumber')}}{{ $createAdminProfileDetail->mobile_number }}">
                            </div>
                            <br>
                            <div class="col-12"></div>
                            <div class="col-lg-6">
                                <label class="form-label" for="first-name">Gender</label>
                                <select name="salutions" id="salutions" class="form-control">
                                    if($createAdminProfileDetail->salutation == 'male'){
                                        echo "selected";
                                        <option value="male">Male</option>
                                    }
                                    if($createAdminProfileDetail->salutation == 'female'){
                                        echo "selected";
                                        <option value="female">Female</option>
                                    }
                                    if($createAdminProfileDetail->salutation == 'other'){
                                        echo "selected";
                                        <option value="others">Other</option>
                                    }
                                 </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Nationality</label>
                                <select name="nationality" id="nationality" class="form-control">
                                    if($createAdminProfileDetail->nationality == 'pakistan'){
                                        echo "selected";
                                        <option value="pakistan">Pakistan</option>
                                    }
                                 </select>
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="first-name">Date of birth</label>
                                  <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}{{ $createAdminProfileDetail->date_of_birth }}">
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="last-name">Martrial Status</label>
                                  <select name="matrialstatus" id="matrialstatus" class="form-control">
                                    if($createAdminProfileDetail->marred_status == 'married'){
                                        echo "selected";
                                        <option value="married">Married</option>
                                    }
                                    if($createAdminProfileDetail->marred_status == 'single'){
                                        echo "selected";
                                        <option value="single">Single</option>
                                    }
                                 </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Blood group</label>
                                <select name="bloodgroup" id="bloodgroup" class="form-control">
                                    if($createAdminProfileDetail->blood_group == 'a+'){
                                        echo "selected";
                                        <option value="a+">A+</option>
                                    }
                                    if($createAdminProfileDetail->blood_group == 'a-'){
                                        echo "selected";
                                        <option value="a-">A-</option>
                                    }
                                    if($createAdminProfileDetail->blood_group == 'b+'){
                                        echo "selected";
                                        <option value="b+">B+</option>
                                    }
                                    if($createAdminProfileDetail->blood_group == 'b-'){
                                        echo "selected";
                                        <option value="b-">B-</option>
                                    }
                                    if($createAdminProfileDetail->blood_group == 'o-'){
                                        echo "selected";
                                        <option value="o-">O-</option>
                                    }
                                    if($createAdminProfileDetail->blood_group == 'o+'){
                                        echo "selected";
                                        <option value="o+">O+</option>
                                    }
                                 </select>
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="first-name">Cnic Number</label>
                                  <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}{{ $createAdminProfileDetail->cnic_number }}">
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="last-name">Father Name</label>
                                  <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}{{ $createAdminProfileDetail->father_name }}">
                            </div>
                            <div class="col-12"></div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Address</label>
                                <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}{{ $createAdminProfileDetail->address }}"></div>
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="first-name">City</label>
                                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}{{ $createAdminProfileDetail->city }}">
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="last-name">State/Province</label>
                                  <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}{{ $createAdminProfileDetail->province }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Postal code</label>
                                <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}{{ $createAdminProfileDetail->postal_code }}">
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="first-name">Country</label>
                                  <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}{{ $createAdminProfileDetail->country }}">
                            </div>
                            <div class="col-lg-6">
                                  <label class="form-label" for="last-name">Phone Number</label>
                                  <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}{{ $createAdminProfileDetail->contact_number }}">
                            </div>
                            <div class="col-12"></div>
                            <div class="col-lg-6">
                                <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                                <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}{{ $createAdminProfileDetail->emergency_contact_person }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                                <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}{{ $createAdminProfileDetail->relationship }}">
                            </div>
                            <div class="col-lg-6">
                              <label class="form-label" for="last-name">Emergency Contact Number</label>
                              <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}{{ $createAdminProfileDetail->person_contact }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="first-name">Place Of birth</label>
                                <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}{{ $createAdminProfileDetail->place_of_birth }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Sub Department</label>
                                <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}{{ $createAdminProfileDetail->sub_department }}">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="last-name">Resign Date</label>
                                <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}{{ $createAdminProfileDetail->end_date }}">
                            </div>  
                            
                            <div class="col-12"></div>
                            <div class="col-12 d-flex justify-content-end">
                              <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                          </form>
                        </div>
                        @endforeach
                    @endif
                  </div>
                  <div class="card mb-3 mb-lg-0">
                    <div class="card-header">
                      <h5 class="mb-0">Educations</h5>
                    </div>
                    <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="#education-form" data-bs-toggle="collapse" aria-expanded="false" aria-controls="education-form"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add new education</span></a>
                      <div class="collapse" id="education-form">
                        <form class="row"  action="{{ route('createEducationRecordFunction') }}" method="POST">
                          @csrf
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Degree</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="degree"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Institute</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="institutet"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Grade</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="grade"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Completing Year</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="completeYear"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Education Type</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="type"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Duration</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="duration"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Language</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="language"/>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="school">Country</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input class="form-control form-control-sm" id="school" type="text" name="country"/>
                          </div>
                          <div class="col-9 col-sm-7 offset-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                          </div>
                        </form>
                        <div class="border-dashed-bottom my-3"></div>
                      </div>
                      @if ($selectEducationInformation->isEmpty())
                          
                      @else
                          @foreach ($selectEducationInformation as $selectEducationInformations)
                          <div class="collapse" id="education-editform">
                            <form class="row" action="{{ route('editEducationRecordFunction',$selectEducationInformations->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Degree</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="degree" value="{{ $selectEducationInformations->degree }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Institute</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="institutet" value="{{ $selectEducationInformations->subject }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Grade</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="grade" value="{{ $selectEducationInformations->grade }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Completing Year</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="completeYear" value="{{ $selectEducationInformations->gradution_year }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Education Type</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="type" value="{{ $selectEducationInformations->qualification_mode }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Duration</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="duration" value="{{ $selectEducationInformations->duration }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Language</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="language" value="{{ $selectEducationInformations->language }}"/>
                              </div>
                              <div class="col-3 mb-3 text-lg-end">
                                <label class="form-label" for="school">Country</label>
                              </div>
                              <div class="col-9 col-sm-7 mb-3">
                                <input class="form-control form-control-sm" id="school" type="text" name="country" value="{{ $selectEducationInformations->country }}"/>
                              </div>
                              <div class="col-9 col-sm-7 offset-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                              </div>
                            </form>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                          <div class="d-flex">
                            <div class="flex-1 position-relative ps-3">
                              <h6 class="fs-0 mb-0 text-primary"> {{ $selectEducationInformations->subject }}</h6>
                              <p class="mb-1">{{ $selectEducationInformations->degree }}</p>
                              <p class="text-1000 mb-0">{{ $selectEducationInformations->duration }}</p>
                              <p class="text-1000 mb-0">{{ $selectEducationInformations->qualification_mode }}, {{ $selectEducationInformations->country }}</p>
                              <div class="border-dashed-bottom my-3"></div>
                            </div>
                          </div>  
                          <div class="d-flex px-3">
                            <a class="text-decoration-none text-black" href="#education-editform" data-bs-toggle="collapse" aria-expanded="false" aria-controls="education-form"> <i class="fas fa-edit mx-2"></i></a> 
                            <a href="{{ route('removeOperationEducation',$selectEducationInformations->id) }}" class=" mx-2 text-decoration-none text-danger"> <i class="fas fa-trash mx-2"></i></a>
                          </div>
                          @endforeach
                          
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 ps-lg-2">
                  <div class="sticky-sidebar">
                    <div class="card mb-3">
                      <div class="card-header">
                        <h5 class="mb-0">Change Password</h5>
                      </div>
                      <div class="card-body bg-light">
                        <form method="post" action="{{ route('changerOperationUserPassword') }}">
                            @csrf
                          <div class="mb-3">
                            <label class="form-label" for="old-password">Old Password</label>
                            <input class="form-control" name="old_password" id="old-password" type="password" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="new-password">New Password</label>
                            <input class="form-control" name="new_password" id="new-password" type="password" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="confirm-password">Confirm Password</label>
                            <input class="form-control" name="conform_password" id="confirm-password" type="password" />
                          </div>
                          <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                        </form>
                      </div>
                    </div>
                    {{--  --}}
                    <div class="card mb-3 mb-lg-0">
                      <div class="card-header">
                        <h5 class="mb-0">Additional Cources</h5>
                      </div>
                      <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="#additional-form" data-bs-toggle="collapse" aria-expanded="false" aria-controls="education-form"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add new additional cources</span></a>
                        <div class="collapse" id="additional-form">
                          <form class="row" method="POST" action={{ route('createAdditionalEducationRecordFunction') }}>
                            @csrf
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Degree</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="degree"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Institute</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="institute"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Grade</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="grade"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Complete</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="completeYear"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Type</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="type"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Duration</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="duration"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Language</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="language"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Country</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="country"/>
                            </div>
                            <div class="col-9 col-sm-7 offset-3">
                              <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                          </form>
                          <div class="border-dashed-bottom my-3"></div>
                        </div>
                        @if ($selectAdditionalCources->isEmpty())
                            
                        @else
                            @foreach ($selectAdditionalCources as $selectAdditionalCourcess)
                            <div class="collapse" id="additional-editform">
                              <form class="row" action="{{ route('editAdditionalEducationRecordFunction',$selectAdditionalCourcess->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Degree</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="degree" value="{{ $selectAdditionalCourcess->degree }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Institute</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="institute" value="{{ $selectAdditionalCourcess->subject }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Grade</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="grade" value="{{ $selectAdditionalCourcess->grade }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Complete</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="completeYear" value="{{ $selectAdditionalCourcess->gradution_year }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Type</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="type" value="{{ $selectAdditionalCourcess->qualification_mode }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Duration</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="duration" value="{{ $selectAdditionalCourcess->duration }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Language</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="language" value="{{ $selectAdditionalCourcess->language }}"/>
                                </div>
                                <div class="col-3 mb-3 text-lg-end">
                                  <label class="form-label" for="school">Country</label>
                                </div>
                                <div class="col-9 col-sm-7 mb-3">
                                  <input class="form-control form-control-sm" id="school" type="text" name="country" value="{{ $selectAdditionalCourcess->country }}"/>
                                </div>
                                <div class="col-9 col-sm-7 offset-3">
                                  <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                              </form>
                              <div class="border-dashed-bottom my-3"></div>
                            </div>
                            <div class="d-flex">
                              <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0 text-primary"> {{ $selectAdditionalCourcess->subject }}</h6>
                                <p class="mb-1">{{ $selectAdditionalCourcess->degree }}</p>
                                <p class="text-1000 mb-0">{{ $selectAdditionalCourcess->duration }}</p>
                                <p class="text-1000 mb-0">{{ $selectAdditionalCourcess->qualification_mode }}, {{ $selectAdditionalCourcess->country }}</p>
                                <div class="border-dashed-bottom my-3"></div>
                              </div>
                            </div>
                            <div class="d-flex px-3">
                              <a class="text-decoration-none text-black" href="#additional-editform" data-bs-toggle="collapse" aria-expanded="false" aria-controls="education-form"> <i class="fas fa-edit mx-2"></i></a> 
                              <a href="{{ route('removeOperationAdditionalEducation',$selectAdditionalCourcess->id) }}" class=" mx-2 text-decoration-none text-danger"> <i class="fas fa-trash mx-2"></i></a>
                            </div>
                            @endforeach
                        @endif
                        
                      </div>
                    </div>
                    {{--  --}}
                    <br>
                    <div class="card mb-3 mb-lg-0">
                      <div class="card-header">
                        <h5 class="mb-0">Social Media</h5>
                      </div>
                      <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="#social-form" data-bs-toggle="collapse" aria-expanded="false" aria-controls="education-form"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add social Media</span></a>
                        <div class="collapse" id="social-form">
                          <form class="row" method="POST" action={{ route('createEmployeeSocialAccount') }}>
                            @csrf
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Facebook</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="facebook"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Google</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="google"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Twitter</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="twitter"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Skype</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="skype"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Linkedin</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="linkedin"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Yahoo</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="yahoo"/>
                            </div>
                            <div class="col-9 col-sm-7 offset-3">
                              <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                          </form>
                          <div class="border-dashed-bottom my-3"></div>
                        </div>
                        
                        @if ( $selectSocialAccount->isEmpty() )
                        @else
                        @foreach ($selectSocialAccount as $selectSocialAccounts)
                        <div class="collapse" id="social-editForm">
                          <form class="row" method="POST" action="{{ route('editEmployeeSocialAccount',$selectSocialAccounts->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Facebook</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="facebook" value="{{ $selectSocialAccounts->facebook_account }}"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Google</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="google" value="{{ $selectSocialAccounts->google_account }}"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Twitter</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="twitter" value="{{ $selectSocialAccounts->twitter_account }}"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Skype</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="skype" value="{{ $selectSocialAccounts->skype_account }}"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Linkedin</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="linkedin" value="{{ $selectSocialAccounts->instagram_account }}"/>
                            </div>
                            <div class="col-3 mb-3 text-lg-end">
                              <label class="form-label" for="school">Yahoo</label>
                            </div>
                            <div class="col-9 col-sm-7 mb-3">
                              <input class="form-control form-control-sm" id="school" type="text" name="yahoo" value="{{ $selectSocialAccounts->yahoo_account }}"/>
                            </div>
                            <div class="col-9 col-sm-7 offset-3">
                              <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                          </form>
                          <div class="border-dashed-bottom my-3"></div>
                        </div>
                        @if (!empty($selectSocialAccounts->facebook_account))
                        <div class="d-flex">
                          <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0 text-primary "> Facebook<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                            <p class="mb-1">{{$selectSocialAccounts->facebook_account}}</p>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                        </div>
                        @endif
                        @if (!empty($selectSocialAccounts->instagram_account))
                        <div class="d-flex">
                          <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0 text-primary "> Linkedin<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                            <p class="mb-1">{{$selectSocialAccounts->instagram_account}}</p>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                        </div>
                        @endif
                        @if (!empty($selectSocialAccounts->skype_account))
                        <div class="d-flex">
                          <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0 text-primary "> Skype<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                            <p class="mb-1">{{$selectSocialAccounts->skype_account}}</p>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                        </div>
                        @endif
                        @if (!empty($selectSocialAccounts->yahoo_account))
                        <div class="d-flex">
                          <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0 text-primary "> Yahoo<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                            <p class="mb-1">{{$selectSocialAccounts->yahoo_account}}</p>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                        </div>
                        @endif
                        @if (!empty($selectSocialAccounts->twitter_account))
                        <div class="d-flex">
                          <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0 text-primary "> Twitter<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                            <p class="mb-1">{{$selectSocialAccounts->twitter_account}}</p>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                        </div>
                        @endif
                        @if (!empty($selectSocialAccounts->google_account))
                        <div class="d-flex">
                          <div class="flex-1 position-relative ps-3">
                            <h6 class="fs-0 mb-0 text-primary "> Google<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></h6>
                            <p class="mb-1">{{$selectSocialAccounts->google_account}}</p>
                            <div class="border-dashed-bottom my-3"></div>
                          </div>
                        </div>
                        @endif
                        <div class="d-flex px-3">
                          <a class="text-decoration-none text-black" href="#social-editForm" data-bs-toggle="collapse" aria-expanded="false" aria-controls="education-form"> <i class="fas fa-edit mx-2"></i></a> 
                          <a href="{{ route('removeOperationSocialMedia',$selectSocialAccounts->id) }}" class=" mx-2 text-decoration-none text-danger"> <i class="fas fa-trash mx-2"></i></a>
                        </div>
                        @endforeach
                        @endif
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