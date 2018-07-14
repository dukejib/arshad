@component('mail::message')
Shop Manager, <br>
A New Order has been Added to Record<br>
<hr>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td>Order Id</td>
            <td>{{ $order['id'] }}</td>
        </tr>

        <tr>
            <td>Order Total</td>
            <td>{{ $order['grandtotal'] }}</td>
        </tr>
        <tr>
            <td>City</td>
            <td>{{ $order['city'] }}</td>
        </tr>
        <tr>
            <td>Time</td>
            <td>{{ $order['created_at'] }}</td>
        </tr>
    </tbody>
</table>

<hr>
Please Check in Your Dashboard
{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
