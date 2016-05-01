<?php if (isset($_GET['page']) && $_GET['page'] != 1) $i = ($_GET['page'] * 10) + $i; ?>
<tr @if( session('success') && session('success') == $lead->id ) class="success" @endif >
    <td>{{ $i }}.</td>
    <td><b>{{ $lead->name }}</b></td>
    <td><b><a href="#">{{ $lead->email }}</a></b></td>
    <td>{{ $lead->city }}</td>
    <td>{{ $lead->state }}</td>
    <td>{{ $lead->zipcode }}</td>
    <td>${{ number_format($lead->income) }}</td>
    <td>{{ $lead->purchase->paid_at->diffForHumans() }}</td>
    <td><button class="btn btn-block btn-info btn-xs" data-toggle="modal" data-target="#verifymodal"><i class="glyphicon glyphicon-ok"></i> Verify</button></td>
</tr>