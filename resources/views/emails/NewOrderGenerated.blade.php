@component('mail::message')
Dear {{ $user->name }},<br>

Following are the details of Your Order.<br>
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
    </tbody>
</table>
<hr>

You can find the details of order at your Ribsncuts Profile page.
{{-- @component('mail::button', ['url' => 'https://www.ribsncuts.com/profile'])
View Order
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
