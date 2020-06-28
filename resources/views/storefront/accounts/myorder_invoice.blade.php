<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{$order->order_id}}</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr>
                            <td class="title">
                                <a href="{{ url('/') }}" data-abc="true">{{ config('app.name', 'Web Titip Barang') }}
                                </a>
                            </td>
                            
                            <td style="text-align: right;">
                                Invoice #: {{$order->order_id}}<br>
                                Dibuat : {{$order->created_at}}<br>
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
                                {{$order->user->address}},
                                {{$order->user->city}}
                                <br>
                                {{$order->user->phone_number}}
                            </td>
                            
                            <td style="text-align: right;"> 
                                {{$order->user->name}}<br>
                                {{$order->user->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="detail">
                <td colspan="2">
                    Methode Pembayaran
                </td>
                
                <td colspan="4" style="text-align: right">
                    Transfer Rekening
                </td>
            </tr>            
            <tr class="heading">
                <td>
                    Barang
                </td>
                <td>
                    Kurir
                </td>
                <td>
                    Tanggal Kedatangan
                </td>
                <td>
                    Harga
                </td>
                <td>
                    Qty
                </td>
                <td>
                    Total
                </td>
            </tr>
            @foreach($order->checkoutProduct as $checkoutproduct)
            <tr class="item">
                <td>{{$checkoutproduct->product->product_name}}</td>
                 <td>{{$checkoutproduct->product->user->name}}</td>
                 <td>{{$checkoutproduct->product->arrival_date}}</td>
                 <td >Rp. {{$checkoutproduct->product->product_price}}</td>
                 <td>{{$checkoutproduct->qty}}</td>
                 <td>Rp. {{$checkoutproduct->price*$checkoutproduct->qty}}</td>
            </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td>Total: </td>
                <td colspan="2">
                   Rp. {{$order->total_price}}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>