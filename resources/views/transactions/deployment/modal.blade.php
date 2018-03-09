<div class="modal fade" id="deploy-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-success" id="mode-modal-header">
                <h4 id="title">Set Delivery Schedule</h4>
            </div>
            {{ Form::open(['id'=>'deployment-form', 'class'=>'form-horizontal', 'route'=>'process-deployment.store', 'method'=>'POST', '@submit.prevent'=>'submitForm']) }}
            <div class="modal-body">
               {{-- <div class="form-group">
                    {!! Form::label('order_no', 'Order #') !!}
                    <div class="form-group">
                        <select name="order_number" id="order_number" class="form-control">
                                    @foreach($orders as $order)
                                        <option value="{{ $order->int_order_id }}">
                                        {{ $order->int_order_id }}
                                    @endforeach
                                </option>
                        </select>
                    </div>
                </div>--}}
                <hr>
                <div class="form-group">
                        {!! Form::label('service_order_number', 'Service Order') !!}
                            <select name="service_order_number" id="service_order_number" class="form-control">
                                @foreach($service_orders as $service)
                                    <option value="{{ $service->int_service_order_id }}">
                                        {{ $service->int_service_order_id }}
                                    </option>
                                @endforeach
                            </select>
                </div>
                    <div class="form-group">
                        <label>Mobilization</label>
                        <input type="date" name="mobilization" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>De-Mobilization</label>
                        <input type="date" name="de_mobilization" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                <input type="hidden" id="link_id" name="link_id" value="0">
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>