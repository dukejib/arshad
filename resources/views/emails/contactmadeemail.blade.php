@component('mail::message')
Dear Administrator, <br>
Someone has contacted us on our website!<br>
<hr>
Name : {{ $contact['username'] }} <br> 
Email : {{ $contact['email'] }} <br>
Phone : {{ $contact['number'] }} <br>
Reason : {{ $contact['reason'] }} <br>
Comment : {{ $contact['comment'] }} <br>
<hr>
{{-- @component('mail::button', ['url' => '']) --}}
{{-- Mark it Read! --}}
{{-- @endcomponent --}}

Please visit the Admin Panel to work on it.<br>
Thanks,<br>
{{ config('app.name') }} Automation
@endcomponent
