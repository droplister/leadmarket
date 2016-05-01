@extends('layouts.default')

@section('content')

    @include('modals.sha256')

    <h2 class="sub-header">{{ $leads->total() }} {{ ( $leads->total() == 1 ? 'Lead' : 'Leads' ) }} Found <small><i class="glyphicon glyphicon-time"></i> Ready for Purchase</small></h2>

    <br />

    @include('tables.contacts')

    {!! $leads->render() !!}

@endsection