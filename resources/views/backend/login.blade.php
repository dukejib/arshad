<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- External Style Sheets -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css'/>
</head>

<body>
                  
    <div id="app">

        <section class="section">
            <div class="container">
                {{-- Image --}}
                {{-- <div class="is-centered">
                        <img src="{{ asset('/images/icons/android-icon-192x192.png') }}" alt="RibsnCuts Logo">
                </div> --}}
                <div class="columns is-mobile is-centered">
                    <div class="column is-half-tablet is-full-mobile is-one-forth-desktop">
                        {{-- Card --}}
                        <div class="card">
                            <header class="card-header has-background-primary ">
                                <p class="card-header-title has-text-white">
                                        
                                        {{__('Login')}}
                                </p>
                            </header>
                            {{-- Start Form --}}
                            <form action="{{ route('admin.login') }}" method="post">
                                @csrf
                                <div class="card-content">
                                    {{-- Email --}}
                                    <div class="field">
                                            <label for="email" class="label">Email</label>
                                            <div class="control has-icons-left">
                                                <input type="text" class="input is-rounded" name="email">
                                                <span class="icon is-small is-left">
                                                        {{-- <i class="fas fa-envelope"></i> --}}
                                                        @fa('envelope','fa-fw')
                                                    </span>
                                            </div>
                                        </div>
                                    {{-- Password --}}
                                    <div class="field">
                                        <label for="password" class="label">Password</label>
                                        <div class="control has-icons-left">
                                            <input type="password" class="input is-rounded" name="password" required>
                                            <span class="icon is-small is-left">
                                                    @fa('lock','fa-fw')
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <button class="button is-rounded is-primary has-margin-10 has-margin-left-25" id="submit"> @fa('sign-in-alt','fa-fw') Login</button>
                                </footer>
                            </form>
                            {{-- End Form --}}
                        </div>
                        {{-- Card End --}}
                    </div>
                </div>
            </div>
        </section>

    </div>   {{--  #app  close --}}


</body>
</html>
