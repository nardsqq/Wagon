<div class="modal fade" id="add_quotation" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-primary" id="quotation-modal-header">
        <h4 id="title">Create Quotation</h4>
      </div>
      <div class="modal-body">
        <form id="formQuotation">
          <div class="row">
    
            <div class="col-xs-6">
              <label for="intClientID">Company Name/ Client</label>
              <select name="intClientID" id="intClientID" class="form-control">
                @foreach ($quotations as $quotation)
                  <option value="{{$client->intClientID}}">{{ $client->strClientName }}</option>
                @endforeach
              </select>
            </div>
             <div class="col-xs-6">
              <label for="strClientAssoc">Client Associate Name</label>
              <select name="strClientAssoc" id="strClientAssoc" class="form-control">
                @foreach ($quotations as $quotation)
                  <option value="{{$quotation->strClientAssoc}}">{{ $quotation->strClientAssoc }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-xs-6">
              <label for="strQuotHeadLocation">Location</label>
              <input type="text" name="strQuotHeadLocation" id="strQuotHeadLocation" class="form-control">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              <label for="dtmQuotHeadDateTime">Date</label>
              <input type="date" name="dtmQuotHeadDateTime" id="dtmQuotHeadDateTime" class="form-control">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
          
            
          </div>
          <div class="row m-t-10">
           
            <div class="col-xs-6">
              <label for="servsearch">Service Search</label>
              <select name="servsearch" id="servsearch" class="form-control">
                  <option>Ship Single GENSET Repair</option>
                  <option>GENSET Installation</option>
                  <option>Ship Equipment Overhauling</option>
              </select>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
        </form>
        <hr>
        <div class="btn-group" role="group" aria-label="...">
          <a href="#" class="btn btn-primary" id="btn-prod">Products</a>
          <a href="#" class="btn btn-default" id="btn-serv">Services</a>
        </div>
        <hr>
        <div id="display-area">
          
        </div>
        <div style="display: none;">
          <div id="content-a">

            <div class="row m-t-10">
              <div class="col-xs-6">
                <label for="prodsearch">Product Search</label>
                <select name="prodsearch" id="prodsearch" class="form-control">
                    <option>Vespa HP Air Compressor</option>
                    <option>Lubrication Engineers IND EQ Lube</option>
                    <option>Daryl Hosh Radiator</option>
                </select>
              </div>
              <div class="col-xs-6">
                <label for="intProdTypeID">Type</label>
                <select name="intProdTypeID" id="intProdTypeID" class="form-control">
                  @foreach ($quotations as $quotation)
                    <option value="{{$prodtype->intProdTypeID}}">{{ $prodtype->intProdTypeID }}</option>
                  @endforeach
                </select>
              </div>
            </div><!--end row-->

            <div class="row m-t-10">
             
              <div class="col-xs-6">
                <label for="intProdID">Item</label>
                <select name="intProdID" id="intProdID" class="form-control">
                  @foreach ($quotations as $quotation)
                    <option value="{{$product->intProdID}}">{{ $product->intProdID }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-xs-6">
                <label for="intBrandID">Brand</label>
                <select name="intBrandID" id="intBrandID" class="form-control">
                  @foreach ($quotations as $quotation)
                    <option value="{{$brand->intBrandID}}">{{ $brand->intBrandID }}</option>
                  @endforeach
                </select>
              </div>
            </div><!--end row-->

            <div class="row m-t-10">
              
              <div class="col-xs-12">
                <label for="dimension">Dimensions</label>
                <select name="dimension" id="dimension" class="form-control">
                  @foreach ($quotations as $quotation)
                    <option value="{{$brand->dimension}}">{{ $brand->dimension }}</option>
                  @endforeach
                </select>
              </div>
            </div><!--end row-->

            <div class="row m-t-10">
              <div class="col-xs-6">
                <label for="category">Category</label>
                  <select name="category" id="category" class="form-control">
                    <option>Consumables</option>
                    <option>Machines</option>
                    <option>Tools</option>
                    <option>Equipment</option>
                  </select>
              </div>
              <div class="col-xs-6">
                <label for="decDelCharRate">Quantity</label>
                <input type="number" id="decDelCharRate" name="decDelCharRate" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" step="01" min="01" required>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
             </div>
            </div><!--end row-->


            <table class="table table-hover table-condensed table-bordered table-responsive">
              <thead>
                <tr>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Product</th>
                  <th class="text-center">Unit Price</th>
                  <th class="text-center">Total Cost</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center"><input type="text" name="test"></td>
                  <td class="text-center">Vespa HP Air Compressor</td>
                  <td class="text-center"><input type="text" name="test2"></td>
                  <td class="text-center">0.00</td>
                  <td class="text-center">
                      <button class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button>
                  </td>
                </tr>
              </tbody>
              </table>
            </div>
            <div id="content-b">
              <table class="table table-hover table-condensed table-bordered table-responsive">
                <thead>
                  <tr>
                    <th class="text-center">Service</th>
                    <th class="text-center">Service Fee</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">Ship Equipment Overhauling</td>
                    <td class="text-center"><input type="text" name="test2"></td>
                    <td class="text-center">
                        <button class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div>
            <h4>SUBTOTAL: <small>0.00</small></h4>
            <h4>TAX RATE: <small>0.00</small></h4>
            <h4>SALES TAX:  <small>0.00</small></h4>
            <h4>OTHER:  <small>-</small></h4>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-primary pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="del_brand">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-danger" id="brand-del-modal-header">
        <center><h4 id="title">Delete Brand Record</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <h5>
            <b>
              You are about to delete this Brand data and all its contents. 
              <br>
              This action cannot be undone. Delete Brand?
            </b>
          </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Brand</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>