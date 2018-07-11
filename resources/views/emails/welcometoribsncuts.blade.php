@component('mail::message')
Welcome to RibsnCuts, {{ $user->name }}

We hope you have a great stay here with us

@component('mail::button', ['url' => ''])
Welcome!
@endcomponent

Thanks,<br>
Team {{ config('app.name') }}
@endcomponent
