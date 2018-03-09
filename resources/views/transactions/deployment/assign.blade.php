<div class="modal fade" id="assign-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Assign Personnel</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Personnel</label>
          {{--  <button id="btn-add-step" type="button" class="btn btn-sm btn-success pull-right">Add Personnel</button>  --}}
        </div>
        <div class="form-group">
          <select class="form-control" multiple v-model="current_so.personnels">
            <option v-for="personnel in personnels" :key="personnel.int_personnel_id" :value="personnel">@{{ personnel.name }}</option>
          </select>
        </div>
        <hr>
        <div class="form-group">
          <table class="table table-hover table-bordered">
            <tbody id="step-list">
              <tr v-for="(personnel, index) in current_so.personnels" :key="personnel.int_personnel_id">
                <td>@{{ personnel.name }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-xs btn-danger" @click="removePersonnel(index)">Remove</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-deploy" value="add" class="modal-btn btn btn-success pull-right" data-dismiss="modal">Assign</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>