<div class="modal fade" id="add_rec" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modal-header-success" id="rec-modal-header">
        <h4 id="title">Receive Items</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/admin/transactions/receive-items', 'method' => 'POST', 'id' => 'formReceive']) !!}
          <div class="row">
            <div class="col-xs-6">
              {!! Form::label('strPONumber', 'PO Reference Number') !!}
              {!! Form::text('strPONumber', null, ['id' => 'strPONumber', 'class' => 'form-control']) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="col-xs-6">
              {!! Form::label('dtmAcquisition', 'Date') !!}
              {!! Form::date('dtmAcquisition', \Carbon\Carbon::now()->format('Y-m-d'), array('id' => 'dtmAcquisition', 'class' => 'form-control')); !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
          </div>
          <div class="form-group m-t-10">
            {!! Form::label('intS_Supp_ID', 'Supplier') !!}
            <select name="intS_Supp_ID" id="intS_Supp_ID" class="form-control">
              @foreach($suppliers as $supplier)
              <option value="{{ $supplier->intSuppID }}">{{ $supplier->strSuppName }}</option>
              @endforeach
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          <hr>
          <div class="form-group">
            <label class="col-lg-3">
              Select items to receive:
            </label>
            <div class="col-lg-9">
              <select name="variants[]" id="variants" v-model="selected" class="form-control">
                @foreach($variants as $variant)
                <option value="{{ $variant }}">{{ $variant->full_detail }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-lg-12">
              <table class="table table-hover table-condensed table-bordered table-responsive">
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">#</th>
                    <th class="text-center">Part No</th>
                    <th class="text-center">Item Name</th>
                    <th class="text-center">Total Cost</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Inventory Cost per Item</th>
                  </tr>
                </thead>
                <tbody>
                  <template>
                    <item-line :item="item" :index="index" v-for="(item, index) in selected" :key="index"></item-line>
                  </template>
                </tbody>
              </table>
            </div>
          </div>
          <hr>
          <div>
            <h4>TOTAL: <small>@{{ total.toLocaleString('en-PH', {'minimumFractionDigits':2, 'maximumFractionDigits':2}) }}</small></h4>
            <!--h4>TAX RATE: <small>0.00</small></h4>
            <h4>SALES TAX:  <small>0.00</small></h4>
            <h4>OTHER:  <small>-</small></h4-->
          </div>
        </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button id="btn-save" value="add" class="modal-btn btn btn-success pull-right">Submit</button>
        <input type="hidden" id="link_id" name="link_id" value="0">
      </div>
    </div>
  </div>
</div>