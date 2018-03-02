<div class="modal fade" id="add_payment_term" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="payment-term-modal-header">
        <h4 id="modal-title">Add New Payment Term</h4>
      </div>
      <div class="modal-body">
        <form id="formPaymentTerm">
          <div class="form-group">
            <label for="str_terms_pay_name">Payment Term Name</label>
            <input type="text" id="str_terms_pay_name" name="str_terms_pay_name" class="form-control" required>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <div class="form-group">
            <label for="dbl_terms_pay_percentage">Rate</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tag" aria-hidden="true"></i></span>
              <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="dbl_terms_pay_percentage" id="dbl_terms_pay_percentage" required min = "01.00">
              <span class="input-group-addon">%</span>
            </div>
          </div>
          
          <div class="form-group">
            <label for="int_terms_pay_days">Days</label>
            <input type="number" class="form-control" name="int_terms_pay_days" id="int_terms_pay_days" required min = "1">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="del_payment_term">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="payment-term-del-modal-header">
        <center><h4 id="title">Delete Payment Term Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Payment Term data and all its contents. 
              <br>
              This action cannot be undone. Delete Payment Term?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Payment Term</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>