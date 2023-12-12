@extends('admin.layouts.app')
@section('content')
    <div class="page-wrapper null compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row" style="color: white">
                            <div class="col-12 col-sm-6">
                                <h3>Invoice</h3>
                            </div>
                            <div class="col-12 col-sm-6" style="color: white">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                            </svg></a></li>
                                    <li class="breadcrumb-item" style="color: white">E-Commerce</li>
                                    <li class="breadcrumb-item active" style="color: white">Invoice</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('invoice') }}">
                                        @csrf
                                        <div class="invoice">
                                            <div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="media">
                                                                <div class="media-left"><img class="media-object img-60"
                                                                        src="{{ asset('admins/assets/images/logo/Bromi-Logo-old.png') }}"
                                                                        alt="">
                                                                </div>
                                                                {{-- <div class="media-body m-l-20 text-right">
                                                                <h4 class="media-heading">Zeta</h4>
                                                                <p>hello@Zeta.in<br><span>289-335-6503</span></p>
                                                            </div> --}}
                                                            </div>
                                                            <!-- End Info-->
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="text-md-end text-xs-center">

                                                                <h3>Invoice #<span class="counter">
                                                                        {{ $randomNumber = mt_rand(1000, 9999) }}</span>
                                                                </h3>
                                                                {{ \Carbon\Carbon::now()->format('F j, Y') }}

                                                            </div>
                                                            <!-- End Title-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- End InvoiceTop-->
                                                <div class="row invo-profile">
                                                    <div class="col-xl-7">
                                                        <div class="media">
                                                            <div class="media-left"><img
                                                                    class="media-object rounded-circle img-60"
                                                                    src="{{ asset('admins/assets/images/user/1.jpg') }}"
                                                                    alt=""></div>
                                                            <div class="media-body m-l-20">
                                                                <h4 class="media-heading">
                                                                    {{ !empty(Auth::user()->first_name) ? Auth::user()->first_name : 'Bunny Den' }}
                                                                    {{ Auth::user()->last_name }}
                                                                </h4>
                                                                <p>{{ !empty(Auth::user()->email) ? Auth::user()->email : 'test@mailcom' }}
                                                                    <br>
                                                                    {{ !empty($user->address) ? $user->address : 'B 402 Ashok nagar  Delhi' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-5">
                                                        <div class="text-xl-end" id="project">
                                                            <h6 style="float: left">To,</h6>
                                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry.It is a long established fact that a reader will be
                                                            distracted by the readable content of a page when looking at its
                                                            layout.</p> --}}
                                                            <div class="fname">
                                                                <div class="fvalue">
                                                                    <textarea class="form-control" rows="3" type="text" value="" name="to_address" id="to_address"
                                                                        data-bs-original-title="" title="" placeholder="Enter Address Here">
																	</textarea>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Invoice Mid-->
                                                <div>
                                                    <div class="table-responsive invoice-table" id="table">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="Customer Name">
                                                                        <h6 class="mb-0">Customer Name</h6>
                                                                    </td>
                                                                    <td class="item">
                                                                        <h6 class="mb-0">Property Name</h6>
                                                                    </td>
                                                                    <td class="Hours">
                                                                        <h6 class="mb-0">Property Description</h6>
                                                                    </td>
                                                                    <td class="subsub_total">
                                                                        <h6 class="mb-0">Sub-Total</h6>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input class="form-control"
                                                                                    type="text" value=""
                                                                                    name="customer_name[]" id="address"
                                                                                    data-bs-original-title="" title=""
                                                                                    placeholder="Customer Name Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input class="form-control"
                                                                                    type="text" value=""
                                                                                    name="property_name[]" id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Name Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="description[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Description Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="sub_total[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Total Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="customer_name[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Customer Name Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="property_name[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Name Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="description[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Description Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="sub_total[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Total Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="customer_records">
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="customer_name[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Customer Name Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="property_name[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Name Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="description[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Description Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="fname">
                                                                            <div class="fvalue"><input
                                                                                    class="form-control" type="text"
                                                                                    value="" name="sub_total[]"
                                                                                    id="address"
                                                                                    data-bs-original-title=""
                                                                                    title=""
                                                                                    placeholder="Property Total Here">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                <tr class="customer_records_dynamic"></tr>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="Rate">
                                                                        <h6 class="mb-0 p-2">sub_total</h6>
                                                                    </td>
                                                                    <td class="payment">
                                                                        <h6 class="mb-0 p-2">$3,644.25</h6>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div>
                                                                <label for="">Terms :</label>
                                                                <div class="fname">
                                                                    <div class="fvalue">
                                                                        <textarea class="form-control" type="text" value="" name="terms" id="address"
                                                                            data-bs-original-title="" title="" placeholder="Enter Terms Here">
																		</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Authorized Sign :</label>
                                                            <div class="fname">
                                                                <div class="fvalue">
                                                                    <textarea class="form-control" type="text" value="" name="sign" id="address"
                                                                        data-bs-original-title="" title="" placeholder="Signature">
																		</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-center mt-3">
                                                <button id="finish" class="btn btn-secondary extra-fields-customer"
                                                    type="button">Add more field</button>
                                                <button class="btn btn-secondary" type="submit">Submit</button>
                                                <button class="btn btn-secondary" type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // invoice
        $('.extra-fields-customer').click(function() {
            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count);
                count++;
            });

        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });
        // end add multiple form input
    </script>
@endpush
