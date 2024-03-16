@extends('admin.layouts.app')
@section('content')
<!-------------Change Password Model----------------->
<div class="modal fade" id="changepwModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="row gy-3 mt-2">
                    <div class="form-group col-12 mb-3">
                        <div class="fname">
                            <input type="password" placeholder="Old Password" name="oldpwd" class="form-control" id="oldpwd" style="text-transform:none;">
                        </div>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <div class="fname">
                            <input type="password" placeholder="New Password" name="newpwd" class="form-control" id="newpwd" style="text-transform:none;">
                        </div>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <div class="fname">
                            <input type="password" placeholder="Confirm Password" name="matchpwd" class="form-control" id="matchpwd" style="text-transform:none;">
                        </div>
                    </div>
                    <input type="hidden" name="shar_string" id="shar_string">
                </div>
                <p class="error-message" style="color:red"></p>
                <div class="text-center">
                    <button class="btn btn-success" style="border-radius: 5px;" type="button" id="updatepwd">Update</button>
                    <button class="btn btn-secondary ms-2" style="border-radius: 5px;" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------->
<!-------------    User Profile Model  -------------->
<div class="modal fade" id="userpfmodel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="First name" name="firstname" class="form-control" id="firstname" value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="Last name" name="lastname" class="form-control" id="lastname" value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="email" placeholder="Email" name="email" class="form-control" id="email" value="{{ $user->email }}" style="text-transform:none;" disabled>
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="Mobile Number" name="mobile_number" class="form-control" id="mobile_number" value="{{ $user->mobile_number }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="Company Name" name="company_name" class="form-control" id="company_name" value="{{ $user->company_name }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="Address" name="address" class="form-control" id="address" value="{{ $user->address }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="Gst Number" name="gst" class="form-control" id="gst" value="{{ $user->gst }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                            <input type="text" placeholder="Rera Number" name="rera" class="form-control" id="rera" value="{{ $user->rera }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <input type="file" name="profile_image" class="form-control" id="profile_image" accept="image/png, image/jpeg" style="border: 1px solid black;border-radius: 5px;">
                    </div>
                    <input type="hidden" name="shar_string" id="shar_string">
                </div>
                <p class="error-message" style="color:red"></p>
                <div class="text-center">
                    <button class="btn btn-success" style="border-radius: 5px;" type="button" id="updateprofile">Edit</button>
                    <button class="btn btn-secondary ms-3" type="button" style="border-radius: 5px;" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-title mb-3" style="margin-left: 10px;">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="text-white">Profile Details</h3>
                        </div>
                    </div>
                </div>
                <div class="user-profile">
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="card profile-header" style="height:auto;background-image: url(&quot;../assets/images/user-profile/bg-profile.jpg&quot;); background-size: cover; background-position: center center; display: block;">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="userpro-box" style="background-color: #e8e9ec !important;border:1px solid black;border-radius:5px;">
                                            <div class="img-wrraper">
                                                <img src="{{ Auth::user()->company_logo ? asset('storage/file_image'.'/'.Auth::user()->company_logo) : asset('Bromi-Logo-card.png')}}" alt="Avatar" style="width:150px;height:150px;">
                                            </div>
                                            <div class="user-designation">
                                                <div class="title"><a target="_blank" href="">
                                                        <h4>{{ $user->company_name }}</h4>
                                                        <h6>( Company )</h6>
                                                    </a>
                                                </div>
                                                <div class="follow">
                                                    <ul class="follow-list">
                                                        <li>
                                                            <div class="follow-num">{{ $user_count }}</div><span>Total Sub Users</span>
                                                        </li>
                                                        <li>
                                                            <div class="follow-num">{{ $user->total_user_limit ? $user->total_user_limit - $user_count : 0 }}</div><span>Remaining Users</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row mt-5 text-center">
                                                <div class="col">
                                                    <button tabindex="0" data-toggle="tooltip" class="btn btn-secondary btn-sm btn-edit" style="border-radius: 5px;width:42px;" title="Edit Profile">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-secondary text-center changepwd ms-4" style="border-radius: 5px;width:42px;" title="Update Password">
                                                        <i class="fa fa-lock"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                                        <div class="bg-white p-3 post-about h-100" style="background-color: #e8e9ec !important;border:1px solid black;border-radius:5px;">
                                            <div class="row">
                                                <div class="col-xxl-6">
                                                    <ul>
                                                        <li>
                                                            <div class="icon"><i data-feather="user"></i></div>
                                                            <div>
                                                                <h5>{{ $user->first_name }} {{ $user->last_name }} </h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="mail"></i></div>
                                                            <div>
                                                                <h5 style="text-transform: none;">{{ $user->email }} </h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="phone"></i></div>
                                                            <div>
                                                                <h5>{{ $user->mobile_number }}
                                                                </h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="map-pin"></i></div>
                                                            <div>
                                                                <h5>{{ isset($user->State->name) ? $user->State->name : '' }}
                                                                </h5> <small class="text-muted">( State )</small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="map-pin"></i></div>
                                                            <div>
                                                                <h5>{{ isset($user->city_name) ? $user->city_name : '' }}</h5>
                                                                <small class="text-muted">( City )</small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="map-pin"></i></div>
                                                            <div>
                                                                <h5>{{ isset($user->address) ? $user->address : '' }}
                                                                </h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <ul>
                                                        <li>
                                                            <div class="icon"><i data-feather="briefcase"></i></div>
                                                            <div>
                                                                <h5>{{ $user->company_name }}</h5>
                                                                <small class="text-muted">( Company Name )</small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="briefcase"></i></div>
                                                            <div>
                                                                <h5>{{ $user->rera }}</h5>
                                                                <small class="text-muted">( Rera Number )</small>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="icon"><i data-feather="briefcase"></i></div>
                                                            <div>
                                                                <h5>{{ $user->gst }}</h5>
                                                                <small class="text-muted">( Gst Number )</small>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- user profile header end-->
                        <div class="col-xl-4 col-lg-12 col-md-5 xl-35">
                            <div class="default-according style-1 faq-accordion job-accordion">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="p-0">
                                                    <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">Plan Details</button>
                                                </h5>
                                            </div>
                                            @if($user->plan_id > 0)
                                            <div class="collapse show h-100" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                                <div class="card-body post-about h-100">
                                                    @foreach ($plans as $plan)
                                                    @if ($user->plan_id == $plan->id)
                                                    <div class="col">
                                                        <div class="pricing-block card text-center h-100">
                                                            <div class="mb-3 mt-5">
                                                                <h2>{{ $plan->name }}</h2>
                                                            </div>
                                                            <div class="pricing-header">
                                                                <div class="price-box">
                                                                    <div>
                                                                        <h3>{{ $plan->price }}</h3>
                                                                        <p>/ month</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pricing-list h-100">
                                                                @if (!empty($plan->details) && !empty(explode('_---_', json_decode($plan->details, true))))
                                                                <h3>Features</h3>
                                                                @foreach (explode('_---_', json_decode($plan->details, true)) as $feature)
                                                                <p>{{ $feature }}</p>
                                                                @endforeach
                                                                @endif
                                                                <a href="{{ route('admin.plans') }}" class="btn btn-secondary mt-2" style="border-radius: 5px;width:42px;" tabindex="0" data-toggle="tooltip" title="Upgrade"><i class="fa fa-wrench"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                    <div class="text-center">
                                                        <h5 class="mb-3">Subscribed On :
                                                            {{ \Carbon\Carbon::parse($user->subscribed_on)->format('d-m-Y') }}
                                                        </h5>
                                                        <h5>Renewal On :
                                                            {{ \Carbon\Carbon::parse($user->subscribed_on)->addMonth()->format('d-m-Y') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="p-0">
                                                    <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon8" aria-expanded="true" aria-controls="collapseicon8">Totals</button>
                                                </h5>
                                            </div>
                                            <div class="collapse show" id="collapseicon8" aria-labelledby="collapseicon8" data-parent="#accordion">
                                                <div class="card-body social-list filter-cards-view">
                                                    <div class="media"><img class="img-30 img-fluid m-r-20" alt="" src="https://updates.mrweb.co.in/bromi/public/admins/assets/images/icons/property.png">
                                                        <div class="media-body"><span class="d-block">Total Properties - {{ $total_property }}</span></div>
                                                    </div>
                                                    <div class="media"><img class="img-30 img-fluid m-r-20" alt="" src="https://updates.mrweb.co.in/bromi/public/admins/assets/images/icons/property.png">
                                                        <div class="media-body"><span class="d-block">Total Projects - {{ $total_project }}</span></div>
                                                    </div>
                                                    <div class="media mb-3"><img class="img-30 img-fluid m-r-20" alt="" src="https://updates.mrweb.co.in/bromi/public/admins/assets/images/icons/enquiry.png">
                                                        <div class="media-body"><span class="d-block">Total Enquiries - {{ $total_enquiry }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-7 xl-65">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-center mb-3">Transaction Details</h3>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead style="background-color: rgba(223, 223, 223, 0.804)">
                                                        <tr>
                                                            <th>Transaction Date Time</th>
                                                            <th>Order Id</th>
                                                            <th>Amount</th>
                                                            <th>Currency</th>
                                                            <th>Plan Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($transactions) > 0)
                                                        @foreach($transactions as $transaction)
                                                        <tr>
                                                            <td>{{ $transaction->payment_completion_time }}</td>
                                                            <td>{{ $transaction->order_id }}</td>
                                                            <td>{{ $transaction->payment_amount }}</td>
                                                            <td>{{ $transaction->payment_currency }}</td>
                                                            <td>{{ $transaction->plan_name }}</td>
                                                            <td>{{ $transaction->payment_status }}</td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="6" class="text-center">No record found</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-center mb-3">Last 10 Open Tickets</h3>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead style="background-color: rgba(223, 223, 223, 0.804)">
                                                        <tr>
                                                            <th>Ticket Id</th>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Priority</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($tickets) > 0)
                                                        @foreach($tickets as $ticket)
                                                        <tr>
                                                            <td>{{ $ticket->ticket_id }}</td>
                                                            <td>{{ $ticket->title }}</td>
                                                            <td>{{ $ticket->category_name }}</td>
                                                            <td>{{ $ticket->priority }}</td>
                                                            <td>{{ $ticket->message }}</td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="5" class="text-center">No record found</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
        $city_encoded = json_encode($cities);
        $state_encoded = json_encode($states);
        @endphp
        @endsection
        @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js" integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).on('click', '.changepwd', function() {
                $("#changepwModal").modal('show');
            });
            //error-message
            //chnage-pwd
            function checkDetails(oldPwd, newPwd, matchpwd) {
                if (oldPwd == "" || newPwd == "" || matchpwd == "") {
                    $(".error-message").text("all fields are required")
                    return false;
                }
                if (newPwd == matchpwd) {
                    return true;
                } else {
                    $(".error-message").text("Your password not matched");
                    return false;
                }

            }

            function checkProfileDetails(firstname, lastname, mobile_number, company_name, address) {
                if (firstname == "" || lastname == "" || mobile_number == "" || company_name == "" || address == "") {
                    $(".error-message").text("all fields are required")
                    return false;
                } else {
                    return true;
                }

            }
            $(document).on('click', '#updatepwd', function() {
                var oldPwd = $("#oldpwd").val();
                var newPwd = $("#newpwd").val();
                var matchpwd = $("#matchpwd").val();
                var isValid = checkDetails(oldPwd, newPwd, matchpwd);
                if (isValid) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{url('admin/changepassword')}}",
                        method: 'POST',
                        data: {
                            oldPwd: oldPwd,
                            newPwd: newPwd,
                            matchpwd: matchpwd
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.success) {
                                $("#changepwModal").modal('hide');
                                Swal.fire({
                                    title: "Your Password Changed Successfully!!"
                                })
                            } else {
                                $(".error-message").text(response.message);
                            }
                        }
                    });
                }

            });
            $(document).on('click', '#updateprofile', function() {

                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var mobile_number = $("#mobile_number").val();
                var company_name = $("#company_name").val();
                var address = $("#address").val();
                var rera = $("#rera").val();
                var gst = $("#gst").val();

                var isValid = checkProfileDetails(firstname, lastname, mobile_number, company_name, address, rera);

                let form_data = new FormData();
                let profile_image = document.getElementById('profile_image');

                if (profile_image && profile_image.files.length > 0) {
                    let file = profile_image.files[0];
                    form_data.set('profile_image', file, file.name);
                }

                form_data.set('firstname', firstname);
                form_data.set('lastname', lastname);
                form_data.set('mobile_number', mobile_number);
                form_data.set('company_name', company_name);
                form_data.set('address', address);
                form_data.set('gst', gst);
                form_data.set('rera', rera);

                let settings = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                };

                let url = "{{url('admin/changeprofile')}}";

                if (isValid) {
                    axios.post(url, form_data, settings).then(response => {
                        window.location.href = "{{ route('admin.profile.details') }}";
                    });
                }
            });
            $('#state_id').select2();
            $('#city_id').select2();
            var cities = @Json($city_encoded);
            var states = @Json($state_encoded);

            $(document).on('change', '#state_id', function(e) {
                $('#city_id').select2('destroy');
                citiesar = JSON.parse(cities);
                $('#city_id').html('');
                for (let i = 0; i < citiesar.length; i++) {
                    if (citiesar[i]['state_id'] == $("#state_id").val()) {
                        $('#city_id').append('<option value="' + citiesar[i]['id'] + '">' + citiesar[i][
                            'name'
                        ] + '</option>')
                    }
                }
                $('#city_id').select2();

            });
            $(document).on('click', '.btn-edit', function() {
                $("#userpfmodel").modal('show');
            });
        </script>
        @endpush
