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
                                                    <p>/ Year</p>
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
												
												@if ($t_goal = Session::get('transaction_goal'))
                                                    <input type="hidden" name="transaction_goal", value={{ $t_goal ?? 'new_subscription' }}>
                                                @endif
                                                
												<input type="hidden" name="plan_id" value="{{$plan->id}}">
                                                @if ($user_id = Session::get('user_id'))
    												<input type="hidden" name="user_id" value="{{ $user_id }}">
                                                    <button
                                                        class="btn btn-primary btn-lg"
                                                        type="button"
                                                        data-original-title="btn btn-primary btn-lg"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#couponModal"
                                                        onclick="setDetails({{ $plan->id }} , {{ $user_id }})"
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

        <div class="modal fade" id="couponModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Coupon Form</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('savePlan')}}" method="post">
                            @csrf
                            <div class="form-row mb-2">
                                <div class="form-group m-b-20">
                                    <div class="fname">
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="coupon_code"
                                            id="coupon_code"
                                            onkeydown="checkavailable()"
                                            placeholder="Enter coupon code"
                                        >
                                        <input type="hidden" name="plan_id" class="form-control mt-2" id="plan_id">
                                        <input type="hidden" name="user_id" class="form-control mt-2" id="user_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 text-center">
                                <div class="col">
                                    <button class="btn custom-theme-button me-3" id="pay_with_coupon" disabled type="submit">Continue</button>
                                </div>
                            </div>
                            <div class="row mb-3 text-center">
                                <div class="col">
                                    <button class="btn custom-theme-button me-3" id="pay_without_coupon" type="submit">I have No Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')

<script>
    let code = document.getElementById('coupon_code');
    let button = document.getElementById('pay_with_coupon');
    let button_without = document.getElementById('pay_without_coupon');

    function checkavailable() {
        button.disabled = code.value != '' ? false : true;
        button_without.disabled = code.value != '' ? true : false;
    }

    function setDetails(plan_id_value, user_id_value) {
        let plan_id = document.getElementById('plan_id');
        let user_id = document.getElementById('user_id');
        plan_id.value = plan_id_value;
        user_id.value = user_id_value;
        code.value = '';
        button.disabled = true;
        button_without.disabled = false;
    }
</script>

@endpush
