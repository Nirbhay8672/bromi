@extends('superadmin.layouts.superapp')
@section('content')
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
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-12 col-md-7 xl-65">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row p-2">
                                                <div class="col-4">
                                                    <div class="card o-hidden">
                                                        <div class="card-body bg-light-green">
                                                            <div class="media static-widget my-3">
                                                                <div class="media-body text-center">
                                                                    <h1 class="font-roboto">{{ $user_count }}</h1>
                                                                    <h3 class="mb-0">Total Sub Users</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card o-hidden">
                                                        <div class="card-body bg-light-orange">
                                                            <div class="media static-widget my-3">
                                                                <div class="media-body text-center">
                                                                    <h1 class="font-roboto">{{ $user->total_user_limit ? $user->total_user_limit - $user_count : 0 }} / {{ $user->total_user_limit ??  0 }}</h1>
                                                                    <h3 class="mb-0">Remaining Users</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card o-hidden">
                                                        <div class="card-body bg-info">
                                                            <div class="media static-widget my-3">
                                                                <div class="media-body text-center">
                                                                    <h1 class="font-roboto">{{ $total_property }}</h1>
                                                                    <h3 class="mb-0">Total Properties</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card o-hidden">
                                                        <div class="card-body bg-light-purpel">
                                                            <div class="media static-widget my-3">
                                                                <div class="media-body text-center">
                                                                    <h1 class="font-roboto">{{ $total_project }}</h1>
                                                                    <h3 class="mb-0">Total Projects</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="card o-hidden">
                                                        <div class="card-body bg-secondary">
                                                            <div class="media static-widget my-3">
                                                                <div class="media-body text-center">
                                                                    <h1 class="font-roboto">{{ $total_enquiry }}</h1>
                                                                    <h3 class="mb-0">Total Enquiries</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        @endsection

