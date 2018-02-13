<div class="modal fade" id="add_quotation" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-primary" id="quotation-modal-header">
        <h4 id="title">Create Quotation</h4>
      </div>
      <form id="formQuotation" method="POST">
      <div class="modal-body">
          <div class="row">
    
            <div class="col-xs-6">
              <label for="int_client_id">Company Name/Client</label>
              <select name="int_client_id" id="int_client_id" class="form-control">
                @foreach ($clients as $client)
                  <option value="{{$client->int_client_id}}">{{ $client->str_client_name }}</option>
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
              <input type="date" name="dtmQuotHeadDateTime" id="dtmQuotHeadDateTime" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="row m-t-10">
              <div class="col-xs-6">
                <label for="intQH_Pers_ID">Agent</label>
                <select name="intQH_Pers_ID" id="intQH_Pers_ID" class="form-control">
                  @foreach ($personnels as $person)
                    <option value="{{$person->intPersID}}">{{ $person->strPersFName }} {{ $person->strPersLName }}</option>
                  @endforeach
                </select>
              </div>
            
          </div>
          <div class="row m-t-10">
           
            
          </div>
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
              <div class="form-group">
                <label class="col-lg-3">
                  Product:
                </label>
                <div class="col-lg-7">
                  <select v-model="product" name="product" class="form-control">
                    <option v-for="(variant, index) in f_variants" :key="variant.intVarID" :value="variant">@{{ variant.full_detail }}</option>
                  </select>
                </div>
                <div class="col-lg-2">
                  <button type="button" class="btn btn-success pull-right m-t-30" @click="addProduct">Add Product</button>
                </div>
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
                    <input hidden readonly name="products[]" :value="product.intVarID">
                    @{{ product.full_detail }}
                  </td>
                  <td class="text-center"><input class="form-control" type="number" min="0" v-model.number="product.qty" name="qty[]"></td>
                  <td class="text-center"><input class="form-control" type="number" min="0" v-model.number="product.price" name="price[]"></td>
                  <td class="text-center">@{{ (product.qty * product.price).toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2}) }}</td>
                  <td class="text-center">
                      <button type="button"  @click="removeProduct(index)" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button>
                  </td>
                </tr>
              </tbody>
              </table>
            </div>
            <div id="content-b"  v-show="!isProduct">
              <div class="row m-t-10 m-b-10">
                <div class="col-xs-6">
                  <label for="servsearch">Service</label>
                  <select v-model="service" class="form-control">
                    <option :value="serv" v-for="(serv,index) in service_areas" :key="index">@{{serv.strServAreaName}}</option>
                  </select>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="col-xs-6">
                  <button type="button"  class="btn btn-success pull-right m-t-30" @click="addService">Add Service</button>
                </div>
              </div>
              <table class="table table-hover table-condensed table-bordered table-responsive">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Service</th>
                    <th class="text-center">Service Fee</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(service, index) in services" :key="index">
                    <td class="text-center">@{{ index + 1 }}</td>
                    <td class="text-center">
                      <input hidden readonly name="services[]" :value="service.intServAreaID">
                      @{{ service.strServAreaName }}
                    </td>
                    <td class="text-center"><input type="number" min="0" v-model.number="service.price" name="serviceprice[]"></td>
                    <td class="text-center">
                        <button type="button"  @click="removeService(index)" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div>
            <h4>TOTAL: <small>@{{ subtotal.toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2}) }}</small></h4>
            <!--h4>TAX RATE: <small>0.00</small></h4>
            <h4>SALES TAX:  <small>0.00</small></h4>
            <h4>OTHER:  <small>-</small></h4-->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button type="button"  id="btn-save" value="add" class="modal-btn btn btn-primary pull-right">Submit</button>
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
      </form>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Cancel, Keep Data</button>
        <button type="button"  id="btn-del-confirm" value="add" class="modal-btn btn btn-danger pull-right">Confirm, Delete Brand</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>