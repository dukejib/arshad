@component('mail::message')
Dear {{ $user->name }},<br>

Following are the details of Your Order.<br>
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
    </tbody>
</table>

You can find the details of order at your Ribsncuts Profile page.
{{-- @component('mail::button', ['url' => 'https://www.ribsncuts.com/profile'])
View Order
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
