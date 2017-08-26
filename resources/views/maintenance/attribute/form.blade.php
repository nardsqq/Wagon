<div id="attrib-add-panel" class="panel panel-success" style="display: none;">
  <div class="panel-heading">
    <div class="panel-title"><h4>Add Attribute</h4></div>
  </div>
  <div class="panel-body">
    {!! Form::open(['route' => 'attributes.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

      <div class="form-group">
        <label for="strAttribName" class="col-sm-2 control-label">Attribute Name</label>
        <div class="col-sm-10">
          <input type="text" id="strAttribName" name="strAttribName" class="form-control">
        </div>
      </div>

      <div class="btn-group pull-right">
        <button id="attrib-hide-panel" type="button" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-success">Save New Attribute</button>
      </div>

    {!! Form::close() !!}
  </div>
</div>