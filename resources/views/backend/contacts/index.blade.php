@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-sm-3">
        {{-- Sidebar Here --}}
        @include('includes.sidebar_navigation')
    </div>

    <div class="col-sm-9">
        
        <h2>Contact
        <br>
        <small>All {{ $type }} made from RibsnCuts</small>
        </h2>
        <div class="table-responsive-sm table-responsive-md">
            <table class="table table-condensed table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Reason</th>
                        <th>Comment</th>
                        <th>Comment Read</th>
                    </tr>
                </thead>
                    
                <tbody>
                    @if($contacts->count()>0)
                        @foreach($contacts as $contact)

                            <tr>
                                <td>{{ $contact->created_at->diffForHumans() }}</td>
                                <td>{{ $contact->username }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->number }}</td>
                                <td>
                                    @switch($contact->reason)
                                        @case('Feedback')
                                            <span class="text-success">Feedback</span>
                                            @break
                                        @case('Complain')
                                            <span class="text-danger text-uppercase">Complain</span>
                                            @break
                                        @case('General Query')
                                            <span class="text-warning">General Query</span>
                                            @break
                                        @case('Jobs')
                                            <span class="text-default">Jobs</span>
                                            @break
                                        @default
                                            <span class="text-info">Something Wrong</span>
                                    @endswitch
                                </td>
                                <td>{{ $contact->comment }}</td>
                                <td>
                                    @if($contact->read == 0)
                                    <a href="{{ route('contact.make.read',['id' => $contact->id]) }}" class="btn btn-sm btn-success">Make Read</a>
                                    @else
                                    <i class="fa fa-check"> Read</i>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection