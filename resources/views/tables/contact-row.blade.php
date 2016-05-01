<?php if (isset($_GET['page']) && $_GET['page'] != 1) $i = ($_GET['page'] * 10) + $i; ?>
<tr>
    <td>{{ $i }}.</td>
    <td><b>{{ $lead->name }}</b></td>
    <td><b><a href="#">{{ $lead->email }}</a></b></td>
    <td>{{ $lead->city }}</td>
    <td>{{ $lead->state }}</td>
    <td>{{ $lead->zipcode }}</td>
    <td>${{ number_format($lead->income) }}</td>
    <td><a href="{{ url(route('purchase', ['lead' => $lead->id])) }}" class="btn btn-block btn-info btn-xs"><i class="glyphicon glyphicon-shopping-cart"></i> $1.00</a></td>
</tr>