<style>
    h1{
        color:#48CFAD;

    }
    h2{
        color:#666666;
        border: 1px solid #666666;
        padding: 3px 8px;
    }
    h3{
        color: #666666;
    }
    p{
        font-size: 12px;
    }
    .clearfix {
        clear: both;
    }

    .text-left {
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
    .container {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: #333333;
    }
    .header-left{
        float: left;
    }
    .header-right{
        float: right;
    }
    .name-area-left{
        float: left;
    }
    .name-area-right{
        float: right;;
    }

    .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    font-size: 12px;
    }

    thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}

tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}

</style>

<div class="container">
    <div class="header">
        <div class="header-left">
            <h1>COMPUTER STORE</h1>
            <p style="margin-top:-10px;">
                <strong>Admin Theme, Inc.</strong><br>
                795 Asome Ave, Suite 850<br>
                New York, 94447<br>
                P: (123) 456-7890
            </p>
        </div>
        <div class="header-right">
            <h2>INVOICE</h2>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="name-area">
        <div class="name-area-left">
            <h3>Paul Smith</h3>
            <p style="margin-top:-10px;">
                <strong>Enterprise Corp.</strong><br>
                234 Great Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                P: (123) 456-7890
            </p>
        </div>
        <div class="name-area-right">
            <table style="width: 40%;" class="table">
                <tbody>
                    <tr>
                    <td class="text-left">INVOICE NO :</td>
                    <td class="text-right">POR0{{ $order->id}}</td>
                    </tr>
                    <tr>
                    <td class="text-left">INVOICE DATE :</td>
                    <td class="text-right">{{ $order->created_at }}</td>
                    </tr>
                    <tr style="background: #48CFAD; color:#ffffff;">
                    <td class="text-left"><strong>Total Due :</strong></td>
                    <td class="text-right"><strong>8,000 USD</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="">
        <table style="margin-top:50px;" class="table">
            <thead>
                <tr style="background: #48CFAD; color:#ffffff;">
                <th style="width:60px" class="text-center">SN</th>
                <th class="text-left">Product Name</th>
                <th style="width:60px" class="text-left">QTY</th>
                <th style="width:140px" class="text-right">UNIT PRICE</th>
                <th style="width:90px" class="text-right">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalPrice = 0;
                $shippingCost = 100;
                $discount = 10;
                $taxRate = 5;
                @endphp
                @foreach($order->carts as $cart)
                <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td>{{$cart->product->name}}</td>
                <td class="text-left">{{$cart->product_quantity}}</td>
                <td class="text-right">{{$cart->product->price}} BDT</td>
                <td class="text-right">
                    @php
                        $totalPrice += $cart->product->price * $cart->product_quantity;
                    @endphp
                    {{$cart->product->price * $cart->product_quantity}} BDT
                </td>
                </tr>
                @endforeach

                <tr>
                <td colspan="3" rowspan="5">
                    <h4>Terms and Conditions</h4>
                    <p>Thank you for your business. We do expect payment within 21 days, so please process this invoice within that time. There will be a 1.5% interest charge per month on late invoices.</p>
                </td>
                <td class="text-right"><strong>Subtotal</strong></td>
            <td class="text-right">{{ $totalPrice }} BDT</td>
                </tr>
                <tr>
                <td class="text-right no-border"><strong>Shipping</strong></td>
                <td class="text-right">{{ $shippingCost }} BDT</td>
                </tr>
                <tr>
                <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                <td class="text-right">{{ $tax = $totalPrice*$taxRate/100 }} BDT</td>
                </tr>
                <tr>
                <td class="text-right no-border"><strong>Discount</strong></td>
                <td class="text-right">{{ $totalDiscount = $totalPrice*$discount/100 }} BDT</td>
                </tr>
                <tr style="background: #48CFAD; color:#ffffff;">
                <td class="text-right no-border">
                    <div class="well well-small green"><strong>Grand Total</strong></div>
                </td>
                <td class="text-right"><strong>{{ $totalPrice + $shippingCost + $tax - $totalDiscount}} BDT</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
