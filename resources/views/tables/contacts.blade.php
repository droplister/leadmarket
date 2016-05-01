<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Income</th>
            <th>Purchased</th>
            <th>Check Hash</th>  
        </tr>
      </thead>
      <tbody>
          <?php $i=0; ?>
          @foreach( $leads as $lead )
              @include('tables.contact-row', ['lead' => $lead, 'i' => ++$i])
          @endforeach
      </tbody>
    </table>
</div>