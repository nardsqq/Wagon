<form class="form-horizontal">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vrid">Vehicle Request ID</label>  
  <div class="col-md-5">
  <input id="vrid" name="vrid" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vrid">Departure</label>  
  <div class="col-md-5">
  <input id="vrid" name="vrid" type="text" placeholder="MM/DD/YYYY" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vrid">Estimated Return</label>  
  <div class="col-md-5">
  <input id="vrid" name="vrid" type="text" placeholder="MM/DD/YYYY" class="form-control input-md" required="">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vrlocation">Location</label>  
  <div class="col-md-5">
  <input id="vrlocation" name="vrlocation" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="vrstatus">Status</label>
  <div class="col-md-5">
    <select id="inquirystatus" name="inquirystatus" class="form-control">
      <option value="1">Active</option>
      <option value="2">Done</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="purppose">Purpose</label>
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
