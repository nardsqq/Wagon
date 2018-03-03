<table id="dataTable" class="table table-bordered table-hover" style="visibility: hidden;" width="100%">
  <thead>
    <tr>
      <th>Payment Term Name</th>
      <th>Percentage</th>
      <th>Days</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody id="payment_term-list">
    @foreach ($payment_terms as $payment_term)
    <tr id="id{{$payment_term->int_terms_pay_id}}">
        <td>{{ $payment_term->str_terms_pay_name }}</td>
        <td>{{ $payment_term->int_terms_pay_percentage }} %</td>
        <td>{{ $payment_term->int_terms_pay_days }}</td>
        <td class="text-center">
            <button class="btn btn-info btn-sm btn-detail open-modal" value="{{ $payment_term->int_terms_pay_id }}"><i class='fa fa-edit'></i>&nbsp; Edit</button>
            <button class="btn btn-danger btn-sm btn-delete" value="{{ $payment_term->int_terms_pay_id }}"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
