<html>

<head>
    <title>Generat PDF Invoice</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 200px;
        height: 60px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="head-title">
        <h1 class="text-center m-0 p-0">Invoice</h1>
    </div>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">{{ $invoice }}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Property Order Date - <span
                    class="gray-color">{{ Carbon\Carbon::now()->toDateTimeString() }}</span></p>
        </div>
        <div class="w-50 float-left logo mt-10">
          
            <img src="Bromi-Logo-card.png" alt="Logo" >
            {{-- <img src="https://techsolutionstuff.com/frontTheme/assets/img/logo_200_60_dark.png" alt="Logo"> --}}
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">From</th>
                <th class="w-50">To</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        {{ $user->address }}
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        {{ $request->address }}
                    </div>
                </td>
                {{-- <td>
                    <div class="box-text">
                        <p> {{ $user->address }}</p> --}}
                {{-- <p>Seattle WA 98109,</p>
                    <p>United States</p>                     --}}
                {{-- <p>Contact: 1-206-266-1000</p>
                    </div>
                </td> --}}
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Payment Method</th>
                <th class="w-50">Other Details</th>
            </tr>
            <tr>
                <td>Cash On Delivery</td>
                <td>{{$request->other_details}}</td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Property</th>
                <th class="w-50">customer_name</th>
                <th class="w-50">Terms</th>
                <th class="w-50">Sales Price</th>
                {{-- <th class="w-50">Company Name</th>
                <th class="w-50"> Status</th>
                <th class="w-50">Role</th> --}}
            </tr>
            @foreach ($data as $item)
            @php
                //  dd($item);
            @endphp
                
            <tr align="center">
                
                <td>{{ $item['property_name']}}</td>
                <td>{{ $item['customer_name']}}</td>
                <td>{{ $item['terms']}}</td>
               <td>{{ $item['sales_price']}}</td>
               
            </tr>
            @endforeach
                
            

            <tr>
                <td colspan="7">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Sub Total</p>
                            <p>Total Payable</p>
                        </div>
                        <div class="total-right w-15 float-left text-bold" align="right">
                            @php
                                $amount=0;
                            @endphp
                            @foreach ($request->sales_price as $key => $item)
                                @php
                                // dd((int)$item);
                                $amount+=(int)$item;
                                   
                                @endphp
                            @endforeach
                            <p>{{  $amount }}</p>
                            <p>{{ $amount}}</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</html>
