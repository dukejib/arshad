@component('mail::message')
Shop Manager, <br>
A New Order has been Added to Record<br>
<table style="border: 1px solid black;color:white;background:gray">
    <tbody>
        <tr>
            <td style="padding-left:5px;padding-top:10px">Order Id</td>
            <td style="padding-left:10px;;padding-top:10px">{{ $order['id'] }}</td>
        </tr>

        <tr>
            <td style="padding-left:5px">Order Total</td>
            <td style="padding-left:10px">{{ $order['grandtotal'] }}</td>
        </tr>
        <tr>
            <td style="padding-left:5px">City</td>
            <td style="padding-left:10px">{{ $order['city'] }}</td>
        </tr>
        <tr>
            <td style="padding-left:5px">Order Time</td>
            <td style="padding-left:10px">{{ $order['created_at'] }}</td>
        </tr>
        <tr>
            <td style="padding-left:5px">Place By</td>
            <td style="padding-left:10px">{{ $user['name'] }}</td>
        </tr>
        <tr>
            <td style="padding-left:5px">Email Address</td>
            <td style="padding-left:10px">{{ $user['email'] }}</td>
        </tr>
        <tr>
            <td style="padding-left:5px">Cell #</td>
            <td style="padding-left:10px">{{ $user->profile['cellnumber'] }}</td>
        </tr>
        <tr>
            <td style="padding-left:5px">Delivery Address</td>
            <td style="padding-left:10px">{{ $user->profile['address'] }}</td>
        </tr>
        
    </tbody>
</table>

Please Check in Your Dashboard
{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
