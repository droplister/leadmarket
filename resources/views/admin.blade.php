@extends('layouts.default')

@section('content')

          <h2 class="sub-header">Admin Area <small>Private</small></h2>

          <div class="row">
              <div class="col-sm-6">
                  <a href="{{ url('simulate') }}" class="btn btn-block btn-success">Simulate Activity</a>
              </div>
              <div class="col-sm-6">
                  <a href="{{ url('cleanup') }}" class="btn btn-block btn-danger">Destroy Database</a>
              </div>
          </div>

          <hr />

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zipcode</th>
                  <th>Income</th> 
                  <th>Timestamp</th>  
                </tr>
              </thead>
              <tbody>
                @foreach( $leads as $lead )
                <tr>
                  <td>{{ $lead->id }}</td>
                  <td>{{ $lead->name }}</td>
                  <td>{{ $lead->email }}</td>
                  <td>{{ $lead->city }}</td>
                  <td>{{ $lead->state }}</td>
                  <td>{{ $lead->zipcode }}</td>
                  <td>${{ number_format($lead->income) }}</td>
                  <td>{{ $lead->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

@endsection