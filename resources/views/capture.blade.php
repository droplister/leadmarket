@extends('layouts.default')

@section('content')

    <h2 class="sub-header">Get a Loan BITCH <small>0% Free!</small></h2>

<form>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection