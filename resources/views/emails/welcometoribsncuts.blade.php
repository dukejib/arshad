@component('mail::message')
Dear {{ $user->name }},<br>
Welcome to RibsnCuts! 

We hope you have a great stay here with us

@component('mail::button', ['url' => 'https://www.ribsncuts.com'])
Visit RibsnCuts
@endcomponent

Thanks,<br>
Team {{ config('app.name') }}
This is an automated message, please do not reply to it.
@endcomponent
