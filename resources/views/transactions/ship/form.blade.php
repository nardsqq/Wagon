<form class="form-horizontal">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="shipid">Ship ID</label>  
  <div class="col-md-5">
  <input id="shipid" name="shipid" type="text" placeholder="" class="form-control input-md" required="">
    
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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="shipname">Ship Name</label>  
  <div class="col-md-5">
  <input id="shipname" name="shipname" type="text" placeholder="" class="form-control input-md" required="">
    
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
