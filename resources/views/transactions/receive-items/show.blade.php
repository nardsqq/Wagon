<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header modal-header-success" id="rec-modal-header">
            <h4 id="title">{{ $header->intRecDelPONum }} Details</h4>
        </div>
        <div class="modal-body">
            <h3>PO Reference Number: {{ $header->intRecDelPONum }}</h3>
            <h4>Supplier: {{$header->supplier->str_supplier_name}}</h4>
            <h4>Date: {{ $header->intRecDelDtmRec->format('F d, Y')}}</h4>
            <table class="table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Part No</th>
                        <th class="text-center">Item Name</th>
                        <th class="text-center">Total Cost</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Inventory Cost per Item</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($header->details as $detail)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $detail->variant->strVarPartNum }}</td>
                        <td class="text-center">{{ $detail->variant->full_detail }}</td>
                        <td class="text-center">{{ $detail->decTotalCost }}</td>
                        <td class="text-center">{{ $detail->intRecDelDetQty }}</td>
                        <td class="text-center">{{ $detail->decInventoryCost }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="modal-footer">
            <button class="btn btn-default pull-right" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>