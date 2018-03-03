<div class="col-xs-12 m-t-10">
    {!! Form::label('term', 'Term') !!}
    <input type="hidden" name="term" :value="selected_term.int_terms_pay_id">
    <select name="" class="form-control" v-model="selected_term">
        <option v-for="term in terms" :key="term.int_terms_pay_id" :value="term">@{{ term.str_terms_pay_name }}</option>
    </select>
</div>


<div class="col-xs-12 m-t-10">
    {!! Form::label('mode', 'Mode') !!}
    <input type="hidden" name="mode" :value="selected_mode.int_mode_pay_id">
    <select name="" class="form-control" v-model="selected_mode">
        <option v-for="mode in modes" :key="mode.int_mode_pay_id" :value="mode">@{{ mode.str_mode_pay_name }}</option>
    </select>
</div>



<div class="col-xs-12 m-t-10">
    {!! Form::label('mode', 'Downpayment') !!}
    <input type="hidden" name="downpayment" :value="selected_downpayment.int_down_id">
    <select name="" class="form-control" v-model="selected_downpayment">
        <option v-for="downpayment in downpayments" :key="downpayment.int_down_id" :value="downpayment">@{{ downpayment.str_down_name }} (@{{downpayment.int_down_percentage}}%)</option>
    </select>
</div>



<div class="col-xs-12 m-t-10">
    {!! Form::label('mode', 'Discount') !!}
    <input type="hidden" name="discount" :value="selected_discount.int_discount_id">
    <select name="" class="form-control" v-model="selected_discount">
        <option v-for="discount in discounts" :key="discount.int_discount_id" :value="discount">@{{ discount.str_discount_name }} (@{{ discount.int_discount_percentage }}%)</option>
    </select>
</div>
        
        