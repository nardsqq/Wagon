<div class="modal fade" id="assign-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-success" id="mode-modal-header">
                <h4 id="title">Assign Personnel</h4>
            </div>
            {{ Form::open(['id'=>'assign-form', 'route'=>'process-deployment.assign', 'method'=>'POST', '@submit.prevent'=>'submitAssignForm']) }}

            <div class="modal-body">
                <div class="form-group">
                    <label>Personnel</label>
                    <button id="btn-add-step" type="button" class="btn btn-sm btn-success pull-right" @click="addPersonnel">Add Personnel
                    </button>
                </div>
                <div class="form-group">
                    <select class="form-control" v-model="selected_personnel" id="select_person">
                        @foreach($personnel as $person)
                            <option value="{{ $person->int_personnel_id }}">{{ $person->name }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <table class="table table-hover table-bordered">
                        <tbody id="step-list">
                        <tr v-for="person in previous_personnel">
                            <td>@{{ person.personnel.name }}
                            </td>
                        </tr>
                        <tr v-for="person in added_personnel">
                            <td>@{{ person.name }}
                                <input type="hidden" name="personnel[]"
                                       :value="person.int_personnel_id">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-xs btn-danger" :value="person.int_personnel_id" @click="removePersonnel(person)">Remove</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button id="btn-deploy" value="add" class="modal-btn btn btn-success pull-right" type="submit">Assign</button>
                <input type="hidden" id="service_schedule_id" name="service_schedule_id" value="0">
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>