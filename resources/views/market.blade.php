@extends('layouts.default')

@section('content')

    <h2 class="sub-header">{{ $leads->total() }} {{ ( $leads->total() == 1 ? 'Lead' : 'Leads' ) }} Found <small>Ready for Purchase</small></h2>

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
              <?php $i=0; ?>
              @foreach( $leads as $lead )
                  @include('partials.market-row', ['lead' => $lead, 'i' => ++$i])
              @endforeach
          </tbody>
        </table>
    </div>

    {!! $leads->render() !!}

@endsection