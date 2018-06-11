@extends('layout.backend_master')

@section('content')

<h2>Contact
<br>
<small>All the contacts made from RibsnCuts</small>
</h2>

<table class="table table-condensed table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Reason</th>
                <th>Comment</th>
            </tr>
        </thead>
            
        <tbody>
            <tr>
                <td>10</td>
                <td>Ali</td>
                <td>Duke@gmai.com</td>
                <td>203434</td>
                <td>Inquiry</td>
                <td>Checking out Stuff</td>
            </tr>
        </tbody>
    </table>

@endsection