<div class="col-xs-12 m-t-10">
    {!! Form::label('term', 'Term') !!}
    <input type="hidden" name="term" :value="selected_term.id">
    <select name="" class="form-control" v-model="selected_term">
        <option v-for="term in terms" :key="term.id" :value="term">@{{ term.desc }}</option>
    </select>
</div>


<div class="col-xs-12 m-t-10">
    {!! Form::label('mode', 'Mode') !!}
    <input type="hidden" name="mode" :value="selected_mode.id">
    <select name="" class="form-control" v-model="selected_mode">
        <option v-for="mode in modes" :key="mode.id" :value="mode">@{{ mode.desc }}</option>
    </select>
</div>



<div class="col-xs-12 m-t-10">
    {!! Form::label('mode', 'Downpayment') !!}
    <input type="hidden" name="downpayment" :value="selected_downpayment.id">
    <select name="" class="form-control" v-model="selected_downpayment">
        <option value="">No downpayment</option>
        <option v-for="downpayment in downpayments" :key="downpayment.id" :value="downpayment">@{{ downpayment.desc }}%</option>
    </select>
</div>



<div class="col-xs-12 m-t-10">
    {!! Form::label('mode', 'Discount') !!}
    <input type="hidden" name="discount" :value="selected_discount.id">
    <select name="" class="form-control" v-model="selected_discount">
        <option value="">No discount</option>
        <option v-for="discount in discounts" :key="discount.id" :value="discount">@{{ discount.desc }}%</option>
    </select>
</div>
        
        