<div class="modal fade" id="deploy-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Set Delivery Schedule</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          {!! Form::label('order_no', 'Order #') !!}
          <div class="form-group">
            <select name="testzxc" id="testzxc">
              <option>ORDERNUMBER001</option>
              <option>ORDERNUMBER002</option>
            </select>
          </div>
        </div>
        <hr>
        <form>
          <div class="form-group">
            {!! Form::label('order_no', 'Service Order') !!}
            <div class="form-group">
              <select name="testzxc" id="testzxc" class="form-control">
                <option>SO-0004-01</option>
                <option>SO-0004-02</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Mobilization</label>
            <input type="date" name="mobi" class="form-control">
          </div>
          <div class="form-group">
            <label>De-Mobilization</label>
            <input type="date" name="demobi" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-deploy" value="add" class="modal-btn btn btn-success pull-right">Set</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>