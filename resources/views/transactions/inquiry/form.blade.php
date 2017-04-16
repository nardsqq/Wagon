<form class="form-horizontal">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="inquiryid">Inquiry ID</label>  
  <div class="col-md-5">
  <input id="inquiryid" name="inquiryid" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateofinquiry">Date of Inquiry</label>  
  <div class="col-md-5">
  <input id="dateofinquiry" name="dateofinquiry" type="text" placeholder="MM/DD/YYYY" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="client">Client</label>
  <div class="col-md-5">
    <select id="client" name="client" class="form-control">
      <option value="1">Client 1</option>
      <option value="2">Client 2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ship">Ship</label>
  <div class="col-md-5">
    <select id="ship" name="ship" class="form-control">
      <option value="1">MV Princess of the Stars</option>
      <option value="2">MV Sample</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="inquirystatus">Inquiry Status</label>
  <div class="col-md-5">
    <select id="inquirystatus" name="inquirystatus" class="form-control">
      <option value="1">Active</option>
      <option value="2">Inactive</option>
      <option value="3">Pending</option>
      <option value="4">Done</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="inquirydesc">Ship Description</label>
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
