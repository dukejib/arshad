@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-3">
        {{-- Sidebar Here --}}
        @include('includes.sidebar_navigation')
    </div>

    <div class="col-md-9">
        <div class="row">

            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Contacts Made
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><i class="fa fa-user fa-3x"></i></div>
                            <div class="col"><h1>6</h1></div>
                        </div>
                        <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                    </div>
                </div>
            </div>

            <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Contacts Made
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col"><i class="fa fa-user fa-3x"></i></div>
                                <div class="col"><h1>6</h1></div>
                            </div>
                            <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Contacts Made
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col"><i class="fa fa-user fa-3x"></i></div>
                                    <div class="col"><h1>6</h1></div>
                                </div>
                                <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Contacts Made
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><i class="fa fa-user fa-3x"></i></div>
                                        <div class="col"><h1>6</h1></div>
                                    </div>
                                    <a href="#" class="btn btn-primary btn-block">Go somewhere</a>
                                </div>
                            </div>
                        </div>

        </div>
    </div>

</div>


@endsection