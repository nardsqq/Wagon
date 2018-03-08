<div class="modal fade" id="set-modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      {!! Form::open(array ('autocomplete'=>'off', 'id'=>'delivery_form', 'class'=>'form-horizontal', 'route'=>'delivery.store') ) !!}
      <div class="modal-header modal-header-success" id="mode-modal-header">
        <h4 id="title">Set Delivery Details</h4>
      </div>
      <div class="modal-body">
        <div class="col-xs-12">
          {!!Form::hidden('int_delivery_id', null, array('id' => 'int_delivery_id')); !!}
          <div class="form-group">
            {!! Form::label('dat_delivery_date', 'Date of Delivery') !!}
            <input type="date" name="dat_delivery_date" id="dat_delivery_date" class="form-control">
          </div>
          <div class="form-group">
            {!! Form::label('personnel', 'Personnel in Charge') !!}
            <select name="int_personnel_id" id="int_personnel_id" class="form-control">
              @foreach($personnels as $personnel)
                <option value="{{ $personnel->int_personnel_id }}">{{$personnel->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-set" type="submit" class="modal-btn btn btn-success pull-right">Set</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
      
      {{ Form::close() }}
    </div>
  </div>
</div>