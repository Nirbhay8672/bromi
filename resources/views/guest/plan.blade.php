@extends('guest.layouts.app')
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Pricing</h5>
                        </div>
                        <div class="card-body pricing-content pricing-col">
                            <div class="row">
								@foreach ($plans as $plan)
								<div class="col-xl-3 col-sm-6 xl-50 box-col-6">
                                    <div class="pricing-block card text-center">
                                        <div class="pricing-header">
                                            <h2>{{$plan->name}}</h2>
                                            <div class="price-box">
                                                <div>
                                                    <h3>{{$plan->price}}</h3>
                                                    <p>/ month</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-list">
                                            <ul class="pricing-inner">
                                              @if (!empty($plan->details) && !empty(explode('_---_',json_decode($plan->details,true))))
											  @foreach (explode('_---_',json_decode($plan->details,true)) as $feature)
											  <li>
												<h6>{{$feature}}</h6>
											</li>
											  @endforeach
											  @endif
                                            </ul>
											<form action="{{route('savePlan')}}" method="post">
												@csrf
												<input type="hidden" name="plan_id" value="{{$plan->id}}">
                                                @if ($user_id = Session::get('user_id'))
    												<input type="hidden" name="user_id" value="{{ $user_id }}">
                                                    <button
                                                        class="btn btn-primary btn-lg"
                                                        type="submit"
                                                    >Subscribe</button>
                                                @endif
											</form>
                                        </div>
                                    </div>
                                </div>
								@endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
