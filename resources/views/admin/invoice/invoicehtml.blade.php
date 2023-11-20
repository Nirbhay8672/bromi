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
                                                            <div class="media-body m-l-20 text-right">
                                                                <h4 class="media-heading">Zeta</h4>
                                                                <p>hello@Zeta.in<br><span>289-335-6503</span></p>
                                                            </div>
                                                        </div>
                                                        <!-- End Info-->
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="text-md-end text-xs-center">
                                                            <h3>Invoice #<span class="counter">2069</span></h3>
                                                            <p>Issued: May<span> 27, 2015</span><br>Payment Due: June
                                                                <span>27, 2015</span>
                                                            </p>
                                                        </div>
                                                        <!-- End Title-->
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!-- End InvoiceTop-->
                                            <div class="row invo-profile">
                                                <div class="col-xl-4">
                                                    <div class="media">
                                                        <div class="media-left"><img
                                                                class="media-object rounded-circle img-60"
                                                                src="{{ asset('admins/assets/images/user/1.jpg') }}"
                                                                alt=""></div>
                                                        <div class="media-body m-l-20">
                                                            <h4 class="media-heading">Johan Deo</h4>
                                                            <p>JohanDeo@gmail.com<br><span>555-555-5555</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="text-xl-end" id="project">
                                                        <h6>Project Description</h6>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry.It is a long established fact that a reader will be
                                                            distracted by the readable content of a page when looking at its
                                                            layout.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Invoice Mid-->
                                            <div>
                                                <div class="table-responsive invoice-table" id="table">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td class="item">
                                                                    <h6 class="mb-0">Item Description</h6>
                                                                </td>
                                                                <td class="Hours">
                                                                    <h6 class="mb-0">Hours</h6>
                                                                </td>
                                                                <td class="Rate">
                                                                    <h6 class="mb-0">Rate</h6>
                                                                </td>
                                                                <td class="subtotal">
                                                                    <h6 class="mb-0">Sub-total</h6>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>Lorem Ipsum</label>
                                                                    <p class="m-0">Lorem Ipsum is simply dummy text of
                                                                        the printing and typesetting industry.</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">5</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$75</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$375.00</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>Lorem Ipsum</label>
                                                                    <p class="m-0">Lorem Ipsum is simply dummy text of
                                                                        the printing and typesetting industry.</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">3</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$75</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$225.00</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>Lorem Ipsum</label>
                                                                    <p class="m-0">Lorem Ipsum is simply dummy text of
                                                                        the printing and typesetting industry.</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">10</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$75</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$750.00</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <label>Lorem Ipsum</label>
                                                                    <p class="m-0">Lorem Ipsum is simply dummy text of
                                                                        the printing and typesetting industry.</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">10</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$75</p>
                                                                </td>
                                                                <td>
                                                                    <p class="itemtext">$750.00</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <p class="itemtext"></p>
                                                                </td>
                                                                <td>
                                                                    <p class="m-0">HST</p>
                                                                </td>
                                                                <td>
                                                                    <p class="m-0">13%</p>
                                                                </td>
                                                                <td>
                                                                    <p class="m-0">$419.25</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="Rate">
                                                                    <h6 class="mb-0 p-2">Total</h6>
                                                                </td>
                                                                <td class="payment">
                                                                    <h6 class="mb-0 p-2">$3,644.25</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 text-center mt-3">
                                            <button class="btn btn-secondary" type="button">Cancel</button>
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
