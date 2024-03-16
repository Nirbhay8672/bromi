<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            width: 100%;
            margin: auto;
            border-collapse: collapse;
        }

        .invoice-header {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .invoice-body {
            padding: 20px;
        }

        #invoice-head {
            display: flex;
            justify-content: space-between;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details h2 {
            margin-top: 0;
        }

        .user-details h2 {
            margin-top: 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-total {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Invoice</h1>
        </div>
        <div class="invoice-body">

            <div id="invoice-head">
                <div class="invoice-details">
                    <h2>Invoice Details</h2>
                    <p><strong>Invoice Number:</strong> {{$sequence}}</p>
                    <p><strong>Plan Purchase
                            Date:</strong>{{ \Carbon\Carbon::parse($user->plan_expire_on)->subYear(1)->format('F j, Y') }}
                    </p>
                    <p><strong>Plan Expiry Date:</strong>
                        {{ \Carbon\Carbon::parse($user->plan_expire_on)->format('F j, Y') }}</p>
                </div>
                <div class="user-details">
                    <h2>User Details</h2>
                    <p><strong> Name: </strong>{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }} </p>
                    <p><strong> Phone:</strong> {{ $user->mobile_number }} </p>
                    <p><strong> Email:</strong> {{ $user->email }}</p>
                </div>
            </div>
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Plan Name</th>
                        <th>Plan Type</th>
                        <th>Users Allowed</th>
                        <th>Price</th>
                        {{-- <th>Total</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->Plan->name }}</td>
                        <td> {{ ucfirst($user->plan_type) }} </td>
                        <td> {{ $user->total_user_limit }} </td>
                        <td>₹ {{ $user->Plan->price }}</td>
                        {{-- <td>₹ {{ $user->Plan->price }}</td> --}}
                    </tr>

                </tbody>
            </table>
            <div class="invoice-total">
                <p><strong>Total:</strong> ₹ {{ $user->Plan->price }} </p>
            </div>
        </div>
    </div>
    <p></p>
    <p></p>
    <p style="padding-left: 20px;">
        Thanks,<br>
        {{ config('app.name') }}
    </p>
</body>

</html>
