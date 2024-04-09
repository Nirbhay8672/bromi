@extends('guest.layouts.app')
@section('content')
    <style>
        .plan-column {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        #plan-details {
            width: 320px;
            margin: 0 auto;
        }
        .plan-label {
            font-weight: bold;
        }
    </style>
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
            <div class="modal-dialog modal-l" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Coupon Form</h5>
                        <button class="btn-close btn-light" type="button" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('savePlan')}}" method="post">
                            @csrf
                            @if ($t_goal = Session::get('transaction_goal'))
                                <input type="hidden" name="transaction_goal", value={{ $t_goal ?? 'new_subscription' }}>
                            @endif
                            <div class="form-row mb-2">
                                <div class="form-group m-b-20">
                                    <div class="">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex  flex-column">
                                                <input
                                                    class="form-control p-2 m-r-10"
                                                    type="text"
                                                    name="coupon_code"
                                                    id="coupon_code"
                                                    {{-- onkeydown="checkavailable()" --}}
                                                    placeholder="Enter coupon code"
                                                >
                                                <p class="text-danger" id="coupon_code_msg"></p>
                                            </div>
                                            <span>
                                                <button class="btn btn-sm btn-primary rounded" id="apply-btn" type="button">Apply</button>
                                            </span>
                                        </div>
                                        <input type="hidden" name="plan_id" class="form-control mt-2" id="plan_id">
                                        <input type="hidden" name="discounted_price" value="" class="form-control mt-2" id="discounted_price">
                                        <input type="hidden" name="discount" value="" class="form-control mt-2" id="discount">
                                        <input type="hidden" name="user_id" class="form-control mt-2" id="user_id">
                                    </div>
                                </div>
                            </div>
                            <div id="plan-details" class="m-b-20">
                                <div class="plan-row">
                                    <div class="plan-column">
                                        <span class="plan-label">Description</span>
                                        <span id="plan-selected-name">Plan Name</span>
                                    </div>
                                    <div class="plan-column">
                                        <span class="plan-label">Gross</span>
                                        <span id="plan-price-col">0</span>
                                    </div>
                                    <div class="plan-column">
                                        <span class="plan-label">Discount</span>
                                        <span id="plan-discount-col">0</span>
                                    </div>
                                    <div class="plan-column">
                                        <span class="plan-label">Amount</span>
                                        <span id="plan-price-gross">0</span>
                                    </div>
                                </div>
                                <div class="plan-row">
                                    <div class="plan-column m-t-10 border-top">
                                        <span class="plan-label">Grand Total</span>
                                        <span id="plan-price-amt">0</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 text-center">
                                <div class="col">
                                    <button class="btn btn-sm btn-primary custom-theme-button me-3" id="pay_without_coupon" type="submit">I have No Coupon</button>
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

    function checkavailable() {
        button.disabled = code.value != '' ? false : true;
        button_without.disabled = code.value != '' ? true : false;
    }

    function setDetails(value, planPrice, planName, userId) {
        console.log(value, planPrice, planName, userId);
        let plan_id = document.getElementById('plan_id');
        let planPriceCol = document.getElementById('plan-price-col');
        let planPriceGross = document.getElementById('plan-price-gross');
        let planPriceAmt = document.getElementById('plan-price-amt');
        let planSelectedName = document.getElementById('plan-selected-name');
        let userID = document.getElementById('user_id');
        plan_id.value = value;
        planPriceCol.textContent  = parseFloat(planPrice).toFixed(2);
        planPriceGross.textContent  = parseFloat(planPrice).toFixed(2);
        planPriceAmt.textContent  = parseFloat(planPrice).toFixed(2);
        planSelectedName.textContent  = planName;
        userID.value  = userId;
        code.value = '';
        // button.disabled = true;
        // button_without.disabled = false;
    }

    $(document).on('click', '#apply-btn', function() {
        let couponCode = $('#coupon_code').val();
        if (!couponCode || '' == couponCode || null == couponCode) {
            $('#coupon_code_msg').text('Please enter a valid coupon code.');
            return;
        }
        // send ajax request.
        $('#coupon_code_msg').text('');
        let plan_id = document.getElementById('plan_id').value;
        let user_id = document.getElementById('user_id').value;
        let btnVal = $('#apply-btn').text();
        $('#apply-btn').html(btnVal + ' <span class="spinner-border spinner-border-sm"></span>');
        //  after successfull ajax response
        $.ajax({
            type: "POST",
            url: "{{ route('apply-coupon') }}",
            data: {
                coupon_code: couponCode,
                plan_id: plan_id,
                user_id: user_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                $('#apply-btn').html(btnVal);
                
                if (response.error) {
                    $('#coupon_code_msg').text(response.message);
                    return;
                }
                $('#coupon_code_msg').text(response.message);
                $('#pay_without_coupon').text('Proceed to pay');
                $('#plan-discount-col').text(parseFloat(response.data.discount).toFixed(2));
                $('#plan-price-gross').html(parseFloat(response.data.price_after_discount).toFixed(2));
                $('#plan-price-amt').html(parseFloat(response.data.price_after_discount).toFixed(2));
                $('#discounted_price').val(parseFloat(response.data.price_after_discount).toFixed(2));
                $('#discount').val(parseFloat(response.data.discount).toFixed(2));
            },
            error: (error) => console.log(error)
        });
        
    });
</script>

@endpush
