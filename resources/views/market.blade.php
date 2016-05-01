@extends('layouts.default')

@section('javascript')

   <script type="text/javascript">
       $(document).ready(function () {
           $('button.blockstamp').click(function(event){
               var button = $(this);
               var sha256 = button.data('sha256');
               $('#hashme').html(sha256);
            });
           $('button.blockstamped').click(function(event){
               var button = $(this);
               var age = button.data('age');
               $('#sha256twomodallabel').append(age);
            });
        });
    </script>
@endsection

@section('content')

    @include('modals.sha256')
    @include('modals.sha256two')

    <h2 class="sub-header">{{ $leads->total() }} {{ ( $leads->total() == 1 ? 'Lead' : 'Leads' ) }} Found <small><i class="glyphicon glyphicon-time"></i> Ready for Purchase</small></h2>

    <br />

    @include('tables.market')

    {!! $leads->render() !!}

@endsection