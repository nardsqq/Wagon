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
              <label for="intClientID">Company Name/Client</label>
              <select name="intClientID" id="intClientID" class="form-control">
                @foreach ($clients as $client)
                  <option value="{{$client->intClientID}}">{{ $client->strClientName }}</option>
                @endforeach
              </select>
            </div>
             <div class="col-xs-6">
              <label for="strClientAssoc">Client Associate Name</label>
              <input type="text" name="strQuotHeadLocation" id="strQuotHeadLocation" class="form-control">
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
              <div class="col-xs-6">
                <label for="intPersID">Agent</label>
                <select name="intPersID" id="intPersID" class="form-control">
                  @foreach ($clients as $client)
                    <option value="{{$client->intClientID}}">{{ $client->strClientName }}</option>
                  @endforeach
                </select>
              </div>
            
          </div>
          <div class="row m-t-10">
           
            
          </div>
        </form>
        <hr>
        <div class="btn-group" role="group" aria-label="...">
          <a href="#" class="btn btn-primary" id="btn-prod" @click="isProduct = true">Products</a>
          <a href="#" class="btn btn-default" id="btn-serv" @click="isProduct = false">Services</a>
        </div>
        <hr>
        <div id="display-area">
          
        </div>
        <div>
          <div id="content-a"  v-show="isProduct">

            <div class="row m-t-10">
              <div class="col-xs-6">
                <label for="category">Category</label>
                  <select v-model="category" id="category" class="form-control">
                    <option v-for="(cat,index) in categories" :key="index">@{{cat}}</option>
                  </select>
              </div>
              
              <div class="col-xs-6">
                <label for="intProdTypeID">Type</label>
                <select v-model="prodtype" class="form-control">
                  <option :value="ptype" v-for="(ptype,index) in f_prodtypes" :key="index">@{{ptype.strProdTypeName}}</option>
                </select>
              </div>
            </div><!--end row-->

            <div class="row m-t-10">
              <div class="col-xs-6">
                <label for="prodsearch">Product Search</label>
                <select v-model="product" class="form-control">
                  <option :value="prod" v-for="(prod,index) in prodtype.products" :key="index">@{{prod.strProdName}}</option>
                </select>
              </div>
              
               <div class="col-xs-6">
                <label for="intBrandID">Brand</label>
                <select v-model="brand" class="form-control">
                  <option :value="br" v-for="(br,index) in f_brands" :key="index">@{{br.strBrandName}}</option>
                </select>
              </div>
            </div><!--end row-->

            <div class="row m-t-10">

              <div class="col-xs-6">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" v-model.number="qty" class="form-control" data-parsley-pattern=/^[a-zA-Z0-9\-\s]+$/ maxlength="45" step="01" min="01" required>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
             </div>

              <div class="col-xs-6">
                <button class="btn btn-success pull-right m-t-30" @click="addProduct">Add Product</button>
              </div>
            </div><!--end row-->


            <table class="table table-hover table-condensed table-bordered table-responsive m-t-20">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Product</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Unit Price</th>
                  <th class="text-center">Total Cost</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(product, index) in products" :key="index">
                  <td class="text-center">@{{ index + 1 }}</td>
                  <td class="text-center">
                    <input hidden readonly name="products[]" :value="product.intProdID">
                    @{{ product.strProdName }}
                  </td>
                  <td class="text-center"><input type="number" min="0" v-model.number="product.qty" name="qty[]"></td>
                  <td class="text-center"><input type="number" min="0" v-model.number="product.price" name="price[]"></td>
                  <td class="text-center">@{{ (product.qty * product.price).toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2}) }}</td>
                  <td class="text-center">
                      <button @click="removeProduct(index)" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button>
                  </td>
                </tr>
              </tbody>
              </table>
            </div>
            <div id="content-b"  v-show="!isProduct">
              <div class="row">
                <div class="col-xs-6">
                  <label for="servsearch">Service Search</label>
                  <select id="servsearch" class="form-control">
                      <option>Ship Single GENSET Repair</option>
                      <option>GENSET Installation</option>
                      <option>Ship Equipment Overhauling</option>
                  </select>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
              </div>
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
            <h4>SUBTOTAL: <small>@{{ subtotal.toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2}) }}</small></h4>
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