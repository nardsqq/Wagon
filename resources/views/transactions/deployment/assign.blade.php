<div class="modal fade" id="assign-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Assign Personnel</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Personnel</label>
          <button id="btn-add-step" type="button" class="btn btn-sm btn-success pull-right">Add Personnel</button>
        </div>
        <div class="form-group">
          <select class="form-control">
            <option>Tyron delos Reyes</option>
          </select>
        </div>
        <hr>
        <div class="form-group">
          <table class="table table-hover table-bordered">
            <tbody id="step-list">
              <tr>
                <td>Tyron delos Reyes</td>
                <td class="text-center">
                  <button type="button" class="btn btn-xs btn-danger">Remove</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-deploy" value="add" class="modal-btn btn btn-success pull-right">Assign</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>