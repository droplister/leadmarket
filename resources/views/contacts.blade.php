@extends('layouts.default')

@section('content')

    @include('modals.verify')

    <h2 class="sub-header">My Contacts <small><i class="glyphicon glyphicon-user"></i></small></h2>

    <br />

    @include('tables.contacts')

    {!! $leads->render() !!}

@endsection