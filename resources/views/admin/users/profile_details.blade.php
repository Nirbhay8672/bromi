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
                            <input type="password" placeholder="Old Password" name="oldpwd" class="form-control"
                            id="oldpwd" style="text-transform:none;">
                        </div>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <div class="fname">
                            <input type="password" placeholder="New Password" name="newpwd" class="form-control"
                            id="newpwd" style="text-transform:none;">
                        </div>
                    </div>
                    <div class="form-group col-12 mb-3">
                        <div class="fname">
                            <input type="password" placeholder="Confirm Password" name="matchpwd" class="form-control"
                            id="matchpwd" style="text-transform:none;">
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
                        <input type="text" placeholder="First name" name="firstname" class="form-control"
                            id="firstname" value="{{ $user->first_name }}" style="text-transform:none;">
                    </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                    <div class="fname">
                        <input type="text" placeholder="Last name" name="lastname" class="form-control"
                            id="lastname" value="{{ $user->last_name }}" style="text-transform:none;">
                    </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                    <div class="fname">
                        <input type="email" placeholder="Email" name="email" class="form-control"
                            id="email" value="{{ $user->email }}" style="text-transform:none;" disabled>
                    </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                    <div class="fname">
                       <input type="text" placeholder="Mobile Number" name="mobile_number" class="form-control"
                            id="mobile_number" value="{{ $user->mobile_number }}" style="text-transform:none;">
                    </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                    <div class="fname">
                    <input type="text" placeholder="Company Name" name="company_name" class="form-control"
                            id="company_name" value="{{ $user->company_name }}" style="text-transform:none;">
                    </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <div class="fname">
                        <input type="text" placeholder="Address" name="address" class="form-control"
                                id="address" value="{{ $user->address }}" style="text-transform:none;">
                        </div>
                    </div>
                    <div class="form-group col-md-6 m-b-4 mb-3">
                        <input
                            type="file"
                            name="profile_image"
                            class="form-control"
                            id="profile_image"
                            accept="image/png, image/jpeg"
                            style="border: 1px solid black;border-radius: 5px;"
                        >
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
        <div class="user-profile">
            <div class="row">
                <!-- user profile header start-->

                <!-- user profile header end-->
                <div class="col-xl-4 col-lg-12 box-col-3 col-md-4">
                    <div class="default-according style-1 faq-accordion job-accordion h-100">
                        <div class="row h-100">
                            <div class="col-xl-12 h-100">
                                <div class="card h-100" data-intro="This is your Your detail">
                                    <div class="card-header border-top-radius">
                                        <h5 class="p-0">
                                            <div class="mb-3 mt-5 text-center"><h2>Profile Details</h2></div>
                                        </h5>
                                    </div>
                                    <div class="collapse show h-100" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                        <div class="card-body post-about h-100">
                                            <div class="text-center">
                                                <img src="{{ Auth::user()->company_logo ? asset('storage/file_image'.'/'.Auth::user()->company_logo) : asset('Bromi-Logo-card.png')}}" alt="Avatar" style="width:150px;height:150px;">
                                            </div>
                                            <ul>
                                                <li>
                                                    <div class="icon"><i data-feather="briefcase"></i></div>
                                                    <div>
                                                        <h5>{{ $user->company_name }}</h5>
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
                                                    <div class="icon"><i data-feather="heart"></i></div>
                                                    <div>
                                                        <h5>{{ isset($user->city_name) ? $user->city_name : '' }}</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="map-pin"></i></div>
                                                    <div>
                                                        <h5>{{ isset($user->State->name) ? $user->State->name : '' }}
                                                        </h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon"><i data-feather="book"></i></div>
                                                    <div>
                                                        <h5>{{ $user->address ?? '-' }}</h5>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="row mt-5 text-center">
                                                <div class="col">
                                                    <button
                                                        tabindex="0" data-toggle="tooltip"
                                                        class="btn btn-secondary btn-sm btn-edit"
                                                        style="border-radius: 5px;width:42px;"
                                                        title="Edit Profile"
                                                    >
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                    <button 
                                                        class="btn btn-secondary text-center changepwd ms-4"
                                                        style="border-radius: 5px;width:42px;"
                                                        title="Update Password"
                                                    >
                                                        <i class="fa fa-lock"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($plans as $plan)
                @if ($user->plan_id == $plan->id)
                <div class="col-xl-4 col-md-4 col-sm-3">
                    <div class="pricing-block card text-center h-100">
                        <div class="mb-3 mt-5"><h2>{{ $plan->name }}</h2></div>
                        <div class="pricing-header">
                            <div class="price-box">
                                <div>
                                    <h3>{{ $plan->price }}</h3>
                                    <p>/ month</p>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-list h-100">
                            <ul class="pricing-inner">
                                @if (!empty($plan->details) && !empty(explode('_---_', json_decode($plan->details,
                                true))))
                                @foreach (explode('_---_', json_decode($plan->details, true)) as $feature)
                                <li>
                                    <h6>{{ $feature }}</h6>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                            <a
                                href="{{ route('admin.plans') }}"
                                class="btn btn-secondary mt-2"
                                style="border-radius: 5px;width:42px;"
                                tabindex="0"
                                data-toggle="tooltip"
                                title="Upgrade"
                            ><i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

                <div class="col-xl-4 col-lg-12 box-col-3 col-md-4">
                    <div class="default-according style-1 faq-accordion job-accordion h-100">
                        <div class="row h-100">
                            <div class="col-xl-12 h-100">
                                <div class="card h-100" data-intro="This is your Your detail">
                                    <div class="card-header border-top-radius">
                                        <h5 class="p-0">
                                            <div class="mb-3 mt-5 text-center"><h2>Plan Details</h2></div>
                                        </h5>
                                    </div>
                                    <div class="collapse show h-100" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                        <div class="card-body post-about h-100">
                                            <ul>
                                                <li>
                                                    <div>
                                                        <h5>Subscribed On :
                                                            {{
                                                            \Carbon\Carbon::parse($user->subscribed_on)->format('d-m-Y')
                                                            }}
                                                        </h5>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div>
                                                        <h5>Renewal On :
                                                            {{
                                                            \Carbon\Carbon::parse($user->subscribed_on)->addMonth()->format('d-m-Y')
                                                            }}
                                                        </h5>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div>
                                                        <h5>Users : {{ $user_count }}
                                                        </h5>
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
    $(document).on('click','.changepwd',function(){
          $("#changepwModal").modal('show');
    });
    //error-message
    //chnage-pwd
    function checkDetails(oldPwd,newPwd,matchpwd)
    {
       if(oldPwd == "" || newPwd == "" || matchpwd == "")
       {
             $(".error-message").text("all fields are required")
             return false;
       }
       if(newPwd == matchpwd)
       {
             return true;
       }
       else
       {
             $(".error-message").text("Your password not matched");
             return false;
       }
      
    }
    function checkProfileDetails(firstname,lastname,mobile_number,company_name,address)
    {
       if(firstname == "" || lastname == "" || mobile_number == "" || company_name == "" || address == "")
       {
             $(".error-message").text("all fields are required")
             return false;
       }
       else
       {
             return true;
       }
      
    }
    $(document).on('click','#updatepwd',function(){
       var oldPwd =  $("#oldpwd").val();
       var newPwd =  $("#newpwd").val();
       var matchpwd =  $("#matchpwd").val();
       var isValid = checkDetails(oldPwd,newPwd,matchpwd);
       if(isValid)
       { 
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $.ajax({
                        url: "{{url('admin/changepassword')}}",
                        method: 'POST',
                        data: {oldPwd:oldPwd,newPwd:newPwd,matchpwd:matchpwd},
                        dataType: 'JSON',
                        success:function(response)
                        {
                           if(response.success)
                           {
                               $("#changepwModal").modal('hide');
                               Swal.fire({
                                    title: "Your Password Changed Successfully!!"
                                })
                           }
                           else
                           {
                               $(".error-message").text(response.message);
                           }
                        }
                   });
       }
       
    });
    $(document).on('click','#updateprofile',function(){

        var firstname =  $("#firstname").val();
        var lastname =  $("#lastname").val();
        var mobile_number =  $("#mobile_number").val();
        var company_name =  $("#company_name").val();
        var address =  $("#address").val();

        var isValid = checkProfileDetails(firstname,lastname,mobile_number,company_name,address);

        let form_data = new FormData();
        let profile_image = document.getElementById('profile_image');

        if(profile_image && profile_image.files.length > 0) {
            let file = profile_image.files[0];
            form_data.set('profile_image', file, file.name);
        }

        form_data.set('firstname', firstname);
        form_data.set('lastname', lastname);
        form_data.set('mobile_number', mobile_number);
        form_data.set('company_name', company_name);
        form_data.set('address', address);

        let settings = { headers:{
            'content-type': 'multipart/form-data',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }};

        let url = "{{url('admin/changeprofile')}}";

        if(isValid)
        {
            axios.post(url, form_data , settings ).then(response => {
                // $("#userpfmodel").modal('hide');
                // Swal.fire({
                //     title: "Your Profile Updated Successfully!!"
                // });
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
    $(document).on('click','.btn-edit',function(){
        $("#userpfmodel").modal('show');
    });
</script>
@endpush
