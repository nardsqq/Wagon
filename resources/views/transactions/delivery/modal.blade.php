<div class="modal fade" id="set-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Set Delivery Details</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            {!! Form::label('abakada', 'Date of Delivery') !!}
            <input type="date" name="abakada" class="form-control">
          </div>
          <div class="form-group">
            {!! Form::label('personnel', 'Personnel in Charge') !!}
            <select name="personnel" id="personnel" class="form-control">
                <option>Junelle Lim</option>
                <option>Tyron delos Reyes</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Set</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>