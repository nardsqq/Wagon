<form class="form-horizontal">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="clientname">Client</label>  
  <div class="col-md-5">
  <input id="clientname" name="clientname" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="adress">Address</label>  
  <div class="col-md-5">
  <input id="adress" name="adress" type="text" placeholder="" class="form-control input-md" required="">
    
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

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="itemdesc">Item Description</label>
  <div class="col-md-5">                     
    <textarea class="form-control" rows="3" style="resize:none;"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qty">Quantity</label>  
  <div class="col-md-5">
  <input id="qty" name="qty" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="purpose">Purpose/Remarks</label>
  <div class="col-md-5">                     
    <textarea class="form-control" rows="3" style="resize:none;"></textarea>
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
