@extends('layouts.default')

@section('content')

          <h2 class="sub-header">Replicator Tool <small>One-Click</small></h2>

          <div class="row">
              <div class="col-sm-6">
                  <a href="{{ url('simulate') }}" class="btn btn-block btn-info">Replicate Database</a>
              </div>
          </div>

@endsection