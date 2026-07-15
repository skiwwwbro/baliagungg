<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $booking->booking_code }}</title>

    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            font-family: DejaVu Sans, sans-serif;
            color: #1A1A1A;
            background: #F5F1EB;
            font-size: 13px;
        }

        .page {
            position: relative;
            min-height: 100vh;
            padding: 55px 58px;
            background: #F5F1EB;
            overflow: hidden;
        }

        .top-shape {
            position: absolute;
            right: -120px;
            top: -140px;
            width: 430px;
            height: 260px;
            background: #071008;
            border-radius: 0 0 0 180px;
        }

        .top-shape-light {
            position: absolute;
            right: 140px;
            top: -35px;
            width: 170px;
            height: 95px;
            background: #B07A45;
            border-radius: 0 0 90px 90px;
            opacity: 0.9;
        }

        .bottom-shape {
            position: absolute;
            left: -90px;
            bottom: -120px;
            width: 520px;
            height: 190px;
            background: #071008;
            border-radius: 50% 50% 0 0;
        }

        .bottom-shape-light {
            position: absolute;
            right: -60px;
            bottom: -95px;
            width: 420px;
            height: 150px;
            background: #B07A45;
            border-radius: 50% 50% 0 0;
            opacity: 0.9;
        }

        .content {
            position: relative;
            z-index: 5;
        }

        .header {
            width: 100%;
            margin-bottom: 50px;
        }

        .invoice-title {
            font-size: 48px;
            font-weight: bold;
            letter-spacing: -2px;
            color: #1A1A1A;
            margin: 0;
        }

        .brand {
            position: absolute;
            right: 0;
            top: 10px;
            text-align: right;
            color: white;
        }

        .brand-title {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .brand-sub {
            margin-top: 6px;
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.65);
        }

        .info-row {
            width: 100%;
            margin-bottom: 42px;
        }

        .invoice-to {
            width: 55%;
            display: inline-block;
            vertical-align: top;
        }

        .invoice-meta {
            width: 38%;
            display: inline-block;
            vertical-align: top;
            text-align: right;
        }

        .label {
            font-size: 12px;
            color: #8C7B62;
            margin-bottom: 4px;
        }

        .customer-name {
            font-size: 23px;
            font-weight: bold;
            line-height: 1.1;
        }

        .muted {
            color: #6B6B6B;
            line-height: 1.6;
        }

        .meta-table {
            display: inline-table;
            text-align: left;
        }

        .meta-table td {
            padding: 4px 0 4px 18px;
            font-size: 13px;
        }

        .meta-table .key {
            font-weight: bold;
            color: #1A1A1A;
        }

        .status {
            display: inline-block;
            padding: 6px 13px;
            border-radius: 30px;
            background: #071008;
            color: white;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.items thead tr {
            background: #071008;
            color: white;
        }

        table.items th {
            padding: 12px 14px;
            font-size: 13px;
            text-align: left;
        }

        table.items th:first-child {
            border-radius: 4px 0 0 4px;
        }

        table.items th:last-child {
            border-radius: 0 4px 4px 0;
            text-align: right;
        }

        table.items td {
            padding: 18px 14px;
            border-bottom: 1px solid #C9BCA8;
            color: #1A1A1A;
        }

        table.items td:last-child {
            text-align: right;
            font-weight: bold;
        }

        .summary {
            width: 100%;
            margin-top: 35px;
        }

        .payment-info {
            width: 50%;
            display: inline-block;
            vertical-align: top;
        }

        .totals {
            width: 45%;
            display: inline-block;
            vertical-align: top;
        }

        .totals-row {
            width: 100%;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .totals-row span:first-child {
            display: inline-block;
            width: 55%;
        }

        .totals-row span:last-child {
            display: inline-block;
            width: 40%;
            text-align: right;
            font-weight: bold;
        }

        .grand-total {
            margin-top: 18px;
            background: #071008;
            color: white;
            padding: 12px 14px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }

        .grand-total span:first-child {
            display: inline-block;
            width: 50%;
            color: #F5F1EB;
        }

        .grand-total span:last-child {
            display: inline-block;
            width: 47%;
            text-align: right;
        }

        .notes {
            margin-top: 70px;
            width: 48%;
            border-left: 4px solid #B07A45;
            padding-left: 12px;
            color: #6B6B6B;
            line-height: 1.6;
        }

        .signature {
            position: absolute;
            right: 58px;
            bottom: 105px;
            width: 230px;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #B07A45;
            margin-bottom: 10px;
        }

        .signature-text {
            font-size: 10px;
            letter-spacing: 4px;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="page">

        <div class="top-shape"></div>
        <div class="top-shape-light"></div>
        <div class="bottom-shape"></div>
        <div class="bottom-shape-light"></div>

        <div class="content">

            <div class="header">
                <h1 class="invoice-title">INVOICE</h1>

                <div class="brand">
                    <div class="brand-title">BALI AGUNG</div>
                    <div class="brand-sub">TRANS</div>
                </div>
            </div>

            <div class="info-row">
                <div class="invoice-to">
                    <div class="label">Invoice To:</div>

                    <div class="customer-name">
                        {{ $booking->customer_name }}
                    </div>

                    <div class="muted" style="margin-top: 8px;">
                        {{ $booking->customer_email ?? '-' }}<br>
                        {{ $booking->customer_phone ?? '-' }}<br>
                        {{ $booking->pickup_location ?? '-' }}
                    </div>
                </div>

                <div class="invoice-meta">
                    <table class="meta-table">
                        <tr>
                            <td class="key">Invoice #</td>
                            <td>{{ $booking->booking_code }}</td>
                        </tr>

                        <tr>
                            <td class="key">Date</td>
                            <td>{{ now()->format('d/m/Y') }}</td>
                        </tr>

                        <tr>
                            <td class="key">Service</td>
                            <td>{{ ucfirst($booking->service_type ?? 'Car') }}</td>
                        </tr>

                        <tr>
                            <td class="key">Status</td>
                            <td>
                                <span class="status">
                                    {{ $booking->payment_status ?? 'unpaid' }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <table class="items">
                <thead>
                    <tr>
                        <th style="width: 8%;">SL.</th>
                        <th style="width: 37%;">Service Description</th>
                        <th style="width: 20%;">Rental Date</th>
                        <th style="width: 17%;">Pickup</th>
                        <th style="width: 18%;">Total</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>
                            <strong>{{ $booking->car_name }}</strong><br>
                            <span class="muted">{{ ucfirst($booking->car_category ?? '-') }}</span>
                        </td>
                        <td>
                            {{ $booking->pickup_date }}<br>
                            <span class="muted">to {{ $booking->return_date }}</span>
                        </td>
                        <td>{{ $booking->pickup_location }}</td>
                        <td>
                            Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="summary">
                <div class="payment-info">
                    <strong>Payment Info:</strong><br><br>

                    <span class="muted">
                        Payment Status: {{ strtoupper($booking->payment_status ?? 'unpaid') }}<br>
                        Booking Code: {{ $booking->booking_code }}<br>
                        Bali Agung Trans<br>
                        Premium Transportation Service
                    </span>
                </div>

                <div class="totals">
                    <div class="totals-row">
                        <span>Sub Total</span>
                        <span>Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}</span>
                    </div>

                    <div class="totals-row">
                        <span>Tax</span>
                        <span>Rp 0</span>
                    </div>

                    <div class="grand-total">
                        <span>TOTAL</span>
                        <span>$ {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="notes">
                <strong>For Any Query:</strong><br>
                WhatsApp: +62 812 4270 9627<br>
                Email: baliagungtrans@gmail.com<br>
                Thank you for choosing Bali Agung Trans.
            </div>

            <div class="signature">
                <div class="signature-line"></div>
                <div class="signature-text">Authorised Signature</div>
            </div>

        </div>
    </div>
</body>
</html>