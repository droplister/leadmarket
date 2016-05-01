@extends('layouts.default')

@section('content')

    <div class="page-header">
        <h1>Bitcoin University <small>Apply Now!</small></h1>
    </div>

    <form method="POST" action="{{ url(route('post::lead')) }}">
    {!! csrf_field() !!}

    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input name="name" type="text" class="form-control input-lg" id="nameInput" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input name="email" type="email" class="form-control input-lg" id="emailInput" placeholder="Email address">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cityInput">City</label>
                        <input name="city" type="text" class="form-control input-lg" id="cityInput" placeholder="City">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="stateInput">State</label>
                        <input name="state" type="text" class="form-control input-lg" id="stateInput" placeholder="State">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="zipcodeInput">Zipcode</label>
                        <input name="zipcode" type="text" class="form-control input-lg" id="zipcodeInput" placeholder="Zipcode">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="incomeInput">Income</label>
                        <input name="income" type="text" class="form-control input-lg" id="incomeInput" placeholder="$">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label>Submit</label>
                    <div><button type="submit" class="btn btn-block btn-lg btn-success">Request Information</button></div>
                </div>
            </div>
            <hr />
        </div>
    </div>

    </form>

@endsection