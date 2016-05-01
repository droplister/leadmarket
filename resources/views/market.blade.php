@extends('layouts.default')

@section('content')

          <h2 class="sub-header">Lead Market <small>Latest</small></h2>

          <br />

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Income</th> 
                  <th>City</th>
                  <th>State</th>
                  <th>Zipcode</th>
                  <th>Time Captured</th>  
                </tr>
              </thead>
              <tbody>
                @foreach( $leads as $lead )
                <tr>
                  <td>{{ $lead->id }}</td>
                  <td>{{ maskName($lead->name) }}</td>
                  <td>{{ maskEmail($lead->email) }}</td>
                  <td>${{ number_format($lead->income) }}</td>
                  <td>{{ $lead->city }}</td>
                  <td>{{ $lead->state }}</td>
                  <td>{{ $lead->zipcode }}</td>
                  <td>{{ $lead->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

@endsection