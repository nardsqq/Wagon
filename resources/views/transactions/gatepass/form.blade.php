<form class="form-horizontal">
<fieldset>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="personnel">Personnel</label>
  <div class="col-md-5">
    <select id="personnel" name="personnel" class="form-control">
      <option value="1">Personnel 1</option>
      <option value="2">Personnel 2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="dept">Department</label>
  <div class="col-md-5">
    <select id="dept" name="dept" class="form-control">
      <option value="1">Department 1</option>
      <option value="2">Department 2</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateofob">Date of OB</label>  
  <div class="col-md-5">
  <input id="dateofob" name="dateofob" type="text" placeholder="MM/DD/YYYY" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="destination">Destination</label>  
  <div class="col-md-5">
  <input id="destination" name="destination" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="purpose">Purpose</label>
  <div class="col-md-5">                     
    <textarea class="form-control" rows="4" style="resize:none;"></textarea>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 cont" for="btnsubmit"></label>
  <div class="col-md-5">
    <button id="btnsubmit" name="btnsubmit" class="btn btn-primary pull-right">Submit</button>
  </div>
</div>

</fieldset>
</form>
