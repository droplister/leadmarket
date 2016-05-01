<?php
    if (isset($_GET['page']) && $_GET['page'] != 1) $i = ($_GET['page'] * 10) + $i;
?>
<tr>
    <td>{{ $i }}.</td>
    <td><a href="#">{{ maskName($lead->name) }}</a></td>
    <td><a href="#">{{ maskEmail($lead->email) }}</a></td>
    <td>${{ number_format($lead->income) }}</td>
    <td>{{ $lead->city }}</td>
    <td>{{ $lead->state }}</td>
    <td>{{ $lead->zipcode }}</td>
    <td><span class="label label-success"><i class="glyphicon glyphicon-link"></i> {{ $lead->created_at->diffForHumans() }}</span></td>
</tr>