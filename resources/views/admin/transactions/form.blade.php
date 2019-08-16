@push('css')
<style>
    .intl-tel-input{
        display: block;
    }
</style>
@endpush

<div class="row ">

    <lable class="col-md-1"></lable>
    <div class="col-md-6">

        <div class="form-group {{ $errors->has('clients_id') ? 'has-error' : ''}}">
            <label for="clients_id" class="">
                <span class="field_compulsory">*</span>@lang('class.label.clients_id')
            </label>
                {!! Form::select('clients_id', $clients, !empty($transactions->client_id) ? $transactions->client_id : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'clients' ]) !!}
                {!! $errors->first('clients_id','<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('transaction_types') ? 'has-error' : ''}}">
            <label for="transaction_types" class="">
                <span class="field_compulsory">*</span>@lang('class.label.transaction_types')
            </label>
               {!! Form::select('transaction_types', $transaction_types, !empty($transactions->trans_type_id) ? $transactions->trans_type_id : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'transaction_types' ]) !!}
                {!! $errors->first('transaction_types','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('sec_ids') ? 'has-error' : ''}}">
            <label for="sec_ids" class="">
                <span class="field_compulsory">*</span>@lang('class.label.sec_ids')
            </label>
               {!! Form::select('sec_ids', $sec_ids, !empty($transactions->sec_id) ? $transactions->sec_id : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'sec_ids' ]) !!}
                {!! $errors->first('sec_ids','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
            <label for="description" class="">
                <span class="field_compulsory">*</span>@lang('class.label.description')
            </label>
                {!! Form::textarea('description',  !empty($transactions->description) ? $transactions->description : '', ['class' => 'form-control', 'id' => 'description', 'rows' => 3, 'cols' => 80, 'style' => 'resize:none']) !!}
                {!! $errors->first('description','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('trade_date') ? 'has-error' : ''}}">
            <label for="trade_date" class="">
                <span class="field_compulsory">*</span>@lang('class.label.trade_date')
            </label>
                {!! Form::datetime('trade_date',  !empty($transactions->trade_date) ? $transactions->trade_date : '', ['id' => 'trade_date', 'class' => 'form-control datepicker', 'style' => 'resize:none']) !!}
                {!! $errors->first('trade_date','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('sattle_date') ? 'has-error' : ''}}">
            <label for="sattle_date" class="">
                <span class="field_compulsory">*</span>@lang('class.label.sattle_date')
            </label>
                {!! Form::datetime('sattle_date', !empty($transactions->sattle_date) ? $transactions->sattle_date : '', ['id' => 'sattle_date', 'class' => 'form-control datepicker', 'style' => 'resize:none']) !!}
                {!! $errors->first('sattle_date','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('curreny_id') ? 'has-error' : ''}}">
            <label for="curreny_id" class="">
                <span class="field_compulsory">*</span>@lang('class.label.curreny_id')
            </label>
            {!! Form::select('curreny_id', $curreny_id, !empty($transactions->curreny_id) ? $transactions->curreny_id : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'curreny_id' ]) !!}
                {!! $errors->first('curreny_id','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('qty') ? 'has-error' : ''}}">
            <label for="qty" class="">
                <span class="field_compulsory">*</span>@lang('class.label.qty')
            </label>
            {!! Form::text('qty', !empty($transactions->qty) ? $transactions->qty : '', ['class' => 'form-control']) !!}
            {!! $errors->first('qty', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
            <label for="price" class="">
                <span class="field_compulsory">*</span>@lang('class.label.price')
            </label>
            {!! Form::text('price', !empty($transactions->price) ? $transactions->price : '', ['class' => 'form-control']) !!}
            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('actual_price') ? 'has-error' : ''}}">
            <label for="actual_price" class="">
                <span class="field_compulsory">*</span>@lang('class.label.actual_price')
            </label>
            {!! Form::text('actual_price', !empty($transactions->actual_price) ? $transactions->actual_price : '', ['class' => 'form-control']) !!}
            {!! $errors->first('actual_price', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
            <label for="amount" class="">
                <span class="field_compulsory">*</span>@lang('class.label.amount')
            </label>
            {!! Form::text('amount', !empty($transactions->amount) ? $transactions->amount : '', ['class' => 'form-control']) !!}
            {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('fx_rate') ? 'has-error' : ''}}">
            <label for="fx_rate" class="">
                <span class="field_compulsory">*</span>@lang('class.label.fx_rate')
            </label>
            {!! Form::text('fx_rate', !empty($transactions->fx_rate) ? $transactions->fx_rate : '', ['class' => 'form-control']) !!}
            {!! $errors->first('fx_rate', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('commission_percentage') ? 'has-error' : ''}}">
            <label for="commission_percentage" class="">
                <span class="field_compulsory">*</span>@lang('class.label.commission_percentage')
            </label>
            {!! Form::text('commission_percentage', !empty($transactions->commission_percentage) ? $transactions->commission_percentage : '', ['class' => 'form-control']) !!}
            {!! $errors->first('commission_percentage', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('commission_ammount') ? 'has-error' : ''}}">
            <label for="commission_ammount" class="">
                <span class="field_compulsory">*</span>@lang('class.label.commission_ammount')
            </label>
            {!! Form::text('commission_ammount', !empty($transactions->commission_ammount) ? $transactions->commission_ammount : '', ['class' => 'form-control']) !!}
            {!! $errors->first('commission_ammount', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('spread') ? 'has-error' : ''}}">
            <label for="spread" class="">
                <span class="field_compulsory">*</span>@lang('class.label.spread')
            </label>
            {!! Form::text('spread', !empty($transactions->spread) ? $transactions->spread : '', ['class' => 'form-control']) !!}
            {!! $errors->first('spread', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('wire_fees_income') ? 'has-error' : ''}}">
            <label for="wire_fees_income" class="">
                <span class="field_compulsory">*</span>@lang('class.label.wire_fees_income')
            </label>
            {!! Form::text('wire_fees_income', !empty($transactions->wire_fees_income) ? $transactions->wire_fees_income : '', ['class' => 'form-control']) !!}
            {!! $errors->first('wire_fees_income', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('wire_fees_bank') ? 'has-error' : ''}}">
            <label for="wire_fees_bank" class="">
                <span class="field_compulsory">*</span>@lang('class.label.wire_fees_bank')
            </label>
            {!! Form::text('wire_fees_bank', !empty($transactions->wire_fees_bank) ? $transactions->wire_fees_bank : '', ['class' => 'form-control']) !!}
            {!! $errors->first('wire_fees_bank', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
            <label for="total" class="">
                <span class="field_compulsory">*</span>@lang('class.label.total')
            </label>
            {!! Form::text('total', !empty($transactions->total) ? $transactions->total : '', ['class' => 'form-control']) !!}
            {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('total_usd') ? 'has-error' : ''}}">
            <label for="total_usd" class="">
                <span class="field_compulsory">*</span>@lang('class.label.total_usd')
            </label>
           {!! Form::text('total_usd', !empty($transactions->total_usd) ? $transactions->total_usd : '', ['class' => 'form-control']) !!}
            {!! $errors->first('total_usd', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('gross_cash') ? 'has-error' : ''}}">
            <label for="gross_cash" class="">
                <span class="field_compulsory">*</span>@lang('class.label.gross_cash')
            </label>
           {!! Form::text('gross_cash', !empty($transactions->gross_cash) ? $transactions->gross_cash : '', ['class' => 'form-control']) !!}
            {!! $errors->first('gross_cash', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('broker_commission') ? 'has-error' : ''}}">
            <label for="broker_commission" class="">
                <span class="field_compulsory">*</span>@lang('class.label.broker_commission')
            </label>
           {!! Form::text('broker_commission', !empty($transactions->broker_commission) ? $transactions->broker_commission : '', ['class' => 'form-control']) !!}
            {!! $errors->first('broker_commission', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('anul_bank_amt') ? 'has-error' : ''}}">
            <label for="anul_bank_amt" class="">
                <span class="field_compulsory">*</span>@lang('class.label.anul_bank_amt')
            </label>
           {!! Form::text('anul_bank_amt', !empty($transactions->anul_bank_amt) ? $transactions->anul_bank_amt : '', ['class' => 'form-control']) !!}
            {!! $errors->first('anul_bank_amt', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('additional_fee_rcved') ? 'has-error' : ''}}">
            <label for="additional_fee_rcved" class="">
                <span class="field_compulsory">*</span>@lang('class.label.additional_fee_rcved')
            </label>
           {!! Form::text('additional_fee_rcved', !empty($transactions->additional_fee_rcved) ? $transactions->additional_fee_rcved : '', ['class' => 'form-control']) !!}
            {!! $errors->first('additional_fee_rcved', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('sattlement_charge') ? 'has-error' : ''}}">
            <label for="sattlement_charge" class="">
                <span class="field_compulsory">*</span>@lang('class.label.sattlement_charge')
            </label>
           {!! Form::text('sattlement_charge', !empty($transactions->sattlement_charge) ? $transactions->sattlement_charge : '', ['class' => 'form-control']) !!}
            {!! $errors->first('sattlement_charge', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('net_cash') ? 'has-error' : ''}}">
            <label for="net_cash" class="">
                <span class="field_compulsory">*</span>@lang('class.label.net_cash')
            </label>
           {!! Form::text('net_cash', !empty($transactions->net_cash) ? $transactions->net_cash : '', ['class' => 'form-control']) !!}
            {!! $errors->first('net_cash', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('banked') ? 'has-error' : ''}}">
            <label for="banked" class="">
                <span class="field_compulsory">*</span>@lang('class.label.banked')
            </label>
           {!! Form::select('banked', $banked, !empty($banked) ? $banked : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'banked' ]) !!}
            {!! $errors->first('banked', '<p class="help-block">:message</p>') !!}
        </div>
         <div class="form-group {{ $errors->has('cash_through_cib') ? 'has-error' : ''}}">
            <label for="cash_through_cib" class="">
                <span class="field_compulsory">*</span>@lang('class.label.cash_through_cib')
            </label>
            {!! Form::text('cash_through_cib', !empty($transactions->cash_through_cib) ? $transactions->cash_through_cib : '', ['class' => 'form-control']) !!}
            {!! $errors->first('cash_through_cib', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('cash_through_rbc') ? 'has-error' : ''}}">
            <label for="cash_through_rbc" class="">
                <span class="field_compulsory">*</span>@lang('class.label.cash_through_rbc')
            </label>
           {!! Form::text('cash_through_rbc', !empty($transactions->cash_through_rbc) ? $transactions->cash_through_rbc : '', ['class' => 'form-control']) !!}
            {!! $errors->first('cash_through_rbc', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('income') ? 'has-error' : ''}}">
            <label for="income" class="">
                <span class="field_compulsory">*</span>@lang('class.label.income')
            </label>
           {!! Form::text('income', !empty($transactions->income) ? $transactions->income : '', ['class' => 'form-control']) !!}
            {!! $errors->first('income', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('expense') ? 'has-error' : ''}}">
            <label for="expense" class="">
                <span class="field_compulsory">*</span>@lang('class.label.expense')
            </label>
           {!! Form::text('expense', !empty($transactions->expense) ? $transactions->expense : '', ['class' => 'form-control']) !!}
            {!! $errors->first('expense', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('dwac_dtc') ? 'has-error' : ''}}">
            <label for="dwac_dtc" class="">
                <span class="field_compulsory">*</span>@lang('class.label.dwac_dtc')
            </label>
           {!! Form::checkbox('dwac_dtc', (isset($fee_schedules_fee['dwac_dtc'])) ? $fee_schedules_fee['dwac_dtc'] : null, !empty($transactions->dwac_dtc) ? 'checked="checked"' : '', array('id'=>'dwac_dtc')) !!}
        </div>
        <div class="form-group {{ $errors->has('certification_clearance') ? 'has-error' : ''}}">
            <label for="certification_clearance" class="">
                <span class="field_compulsory">*</span>@lang('class.label.certification_clearance')
            </label>
           {!! Form::checkbox('cert_clearance', (isset($fee_schedules_fee['certification_clearance'])) ? $fee_schedules_fee['certification_clearance'] : null, !empty($transactions->cert_clearance) ? 'checked="checked"' : '', array('id'=>'cert_clearance')) !!}
        </div>
        <div class="form-group {{ $errors->has('management_fees') ? 'has-error' : ''}}">
            <label for="management_fees" class="">
                <span class="field_compulsory">*</span>@lang('class.label.management_fees')
            </label>
           {!! Form::checkbox('management_fees', (isset($fee_schedules_fee['management_fees'])) ? $fee_schedules_fee['management_fees'] : null, !empty($transactions->management_fees) ? 'checked="checked"' : '', array('id'=>'management_fees')) !!}
        </div>
        <div class="form-group {{ $errors->has('fed_ex') ? 'has-error' : ''}}">
            <label for="fed_ex" class="">
                <span class="field_compulsory">*</span>@lang('class.label.fed_ex')
            </label>
            {!! Form::checkbox('fed_ex', (isset($fee_schedules_fee['fed_ex'])) ? $fee_schedules_fee['fed_ex'] : null, !empty($transactions->fed_ex) ? 'checked="checked"' : '', array('id'=>'fed_ex')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : trans('common.label.create'), ['class' => 'btn btn-primary']) !!}
            {{ Form::reset(trans('common.label.clear_form'), ['class' => 'btn btn-light']) }}
        </div>
    </div>
</div>
@push('js')
<script>
    $('.selectTag2').select2({
        tokenSeparators: [",", " "]
    });
</script>
<script>
        $(document).ready(function() {
         
    $('.datepicker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
      });
            $('input[type="text"]').focusout(function(){
                if ($(this).val() == '') {
                    var initVal = 0;
                    $(this).val(initVal.toFixed(2));
                }
            });

            $('input[name="trade_date"]').focusout(function() {
                if ($(this).val() != '') {
                   var d = new Date($(this).val()).getDate() + 2;
                   var m = new Date($(this).val()).getMonth();
                   var y = new Date($(this).val()).getFullYear();
                   var day = new Date($(this).val()).getDay();
                   var finalDate = (m+1)+'/'+d+'/'+y;
                   if (day == 5) {
                        finalDate = (m+1)+'/'+(d+1)+'/'+y;
                   }
                   $('input[name="sattle_date"]').val(finalDate);
                }
            });

            $('input[name="price"]').focusout(function(){
                var price = parseFloat($('input[name="price"]').val());
                var trans_type = $('select[name="transaction_types"]').val();
                var qty = parseFloat($('input[name="qty"]').val());
                var ammount = calculateAmount(qty, price, trans_type);
                $('input[name="amount"]').val(ammount);
                $('input[name="actual_price"]').val(parseFloat(0));
            });

            $('input[name="wire_fees_bank"]').focusout(function(){
                var total = calculateTotal();
                $('input[name="total"]').val(total.toFixed(2));
            });

            $('input[name="broker_commission"]').focusout(function() {
                
                var brokr_commission = parseFloat($('input[name="broker_commission"]').val());
                var gross_cash = parseFloat($('input[name="gross_cash"]').val());

                if (brokr_commission != 0) {
                    var anul_bank_amt = parseFloat(gross_cash - brokr_commission);
                    $('input[name="anul_bank_amt"]').val(anul_bank_amt);
                } else {
                    var amt = $('input[name="total"]').val();
                    $('input[name="anul_bank_amt"]').val(amt);
                }
                
            });

            $('input[name="sattlement_charge"]').focusout(function(){
                var sattlement_charge = parseFloat($('input[name="sattlement_charge"]').val());
                var anul_bank_amt = parseFloat($('input[name="anul_bank_amt"]').val());
                var brokr_commission = parseFloat($('input[name="broker_commission"]').val());
                var net_cash = calculateNetCash(anul_bank_amt, sattlement_charge, brokr_commission);
                if (isNaN(net_cash)){
                    $('input[name="net_cash"]').val(parseFloat(0));
                } else {
                    $('input[name="net_cash"]').val(net_cash);
                }
            });

            $('select[name="banked"]').on('change', function() {
                var banked = $('select[name="banked"]').val();
                var net_cash = $('input[name="net_cash"]').val();
                if (banked == 'YES') {
                    $('input[name="cash_through_cib"]').val(net_cash);
                    $('input[name="cash_through_rbc"]').val(0);
                }
                if (banked == 'REC') {
                    $('input[name="cash_through_rbc"]').val(net_cash);
                    $('input[name="cash_through_cib"]').val(0);
                }
                if (banked == '0') {
                    $('input[name="cash_through_rbc"]').val(0);
                    $('input[name="cash_through_cib"]').val(0);
                }
            });

            $('input[name="additional_fee_rcved"]').focusout(function(){
                calculateIncome();
            });

            $('input[name="sattlement_charge"]').focusout(function(){
                calculateExpense();
            });

            $('select[name="curreny_id"]').on("change", function(){
                var currency = $(this).val();
                if (currency == '1') {
                    $('input[name="fx_rate"]').val(1);
                } else {
                    $('input[name="fx_rate"]').val(0);
                }
            });

            $('input[name="commission_percentage"]').focusout(function(){
                calculateCommissionAmt();
            });

        });

        function calculateAmount(qty = 0, price = 0, trans_type = '') {
            if (trans_type != 10) {
                return parseFloat(qty * price);
            } else {
                return parseFloat(qty * -price);
            }
        }

        function calculateTotal() {
            var commission_ammount = parseFloat($('input[name="commission_ammount"]').val());
            var wire_fees_bank = parseFloat($('input[name="wire_fees_bank"]').val());
            var amt = parseFloat($('input[name="amount"]').val());
            var wire_fees_income = parseFloat($('input[name="wire_fees_income"]').val());
            var fx_rate = parseFloat($('input[name="fx_rate"]').val());

            if (fx_rate == '') {
                fx_rate = 1;
            } else {
                fx_rate = fx_rate;
            }
            var total = (amt - commission_ammount + wire_fees_income + wire_fees_bank) * fx_rate;
            calculateGrossTotal();
            var total_usd = parseFloat(total / fx_rate);
            $('input[name="total_usd"]').val(total_usd.toFixed(2));
            return total;
        }

        function calculateGrossTotal() {
            var actual_price = parseFloat($('input[name="actual_price"]').val());
            var amount = parseFloat($('input[name="amount"]').val());
            var fx_rate = parseFloat($('input[name="fx_rate"]').val());
            var qty = parseFloat($('input[name="qty"]').val());
            if (actual_price == 0) {
                var gross_total = (amount * fx_rate);
                $('input[name="gross_cash"]').val(gross_total.toFixed(2));
            } else {                
                var gross_total = (actual_price * qty) / fx_rate;
                $('input[name="gross_cash"]').val(gross_total.toFixed(2));
            }
        }

        function calculateNetCash(anul_bank_amt = 0, sattlement_charge = 0, brokr_commission = 0) {
            var net_cash = parseFloat(anul_bank_amt - sattlement_charge);
            var expanse = parseFloat(sattlement_charge + brokr_commission);
            if (isNaN(expanse)){
                $('input[name="expense"]').val(parseFloat(0));
            } else {
                $('input[name="expense"]').val(expanse);
            }
            
            return net_cash.toFixed(2);
        }

        function calculateIncome() {
            var comm_amt = parseFloat($('input[name="commission_ammount"]').val());
            var spread = parseFloat($('input[name="spread"]').val());
            var wire_fees_income = parseFloat($('input[name="wire_fees_income"]').val());
            var additional_fee_rcved = parseFloat($('input[name="additional_fee_rcved"]').val());
            var income = parseFloat(comm_amt + spread + wire_fees_income + additional_fee_rcved);
            return $('input[name="income"]').val(income.toFixed(2));
        }

        function calculateExpense() {
            var broker_commission = parseFloat($('input[name="broker_commission"]').val());
            var sattlement_charge = parseFloat($('input[name="sattlement_charge"]').val());

            var expense = broker_commission + sattlement_charge;
            return $('input[name="expense"]').val(expense);
        }

        function calculateCommissionAmt(){
            var commission_percentage = parseFloat($('input[name="commission_percentage"]').val());
            var amount = parseFloat($('input[name="amount"]').val());

            if (commission_percentage == 0) {
                var commission_ammount = 0;
            } else if (Math.abs(parseFloat(amount * commission_percentage) / 100) < 150) {
                var commission_ammount = 150;
            } else {
                var commission_ammount = Math.abs(parseFloat(amount * commission_percentage) / 100);
            }

            $('input[name="commission_ammount"]').val(commission_ammount.toFixed(2));
        }
</script>
@endpush

