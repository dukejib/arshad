@component('mail::message')
Dear Administrator, <br>
Someone has contacted us on our website!<br>
<table style="border: 1px solid black;color:white;background:gray">
    <tbody>
        <tr>
            <td style="padding-left:5px;padding-top:10px">Contact Name</td>
            <td style="padding-left:10px;padding-top:10px;">{{ $contact['username'] }}</td>
        </tr>

        <tr>
            <td style="padding-left:5px">Email Address</td>
            <td style="padding-left:10px">{{ $contact['email'] }}</td>
        </tr>

        <tr>
            <td style="padding-left:5px">Cell #</td>
            <td style="padding-left:10px">{{ $contact['number'] }}</td>
        </tr>

        <tr>
            <td style="padding-left:5px">Reason of Contact </td>
            <td style="padding-left:10px">{{ $contact['reason'] }}</td>
        </tr>

        <tr>
            <td style="padding-left:5px">Comments </td>
            <td style="padding-left:10px">{{ $contact['comment'] }}</td>
        </tr>

    </tbody>
</table>
{{-- @component('mail::button', ['url' => '']) --}}
{{-- Mark it Read! --}}
{{-- @endcomponent --}}

Please visit the Admin Panel to work on it.<br>
Thanks,<br>
{{ config('app.name') }} Automation
@endcomponent
