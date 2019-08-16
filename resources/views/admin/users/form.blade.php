@push('css')
<style>
    .intl-tel-input{
        display: block;
    }
</style>
@endpush

<div class="row ">

    <lable class="col-md-1"></lable>
    <div class="col-md-12">

        <div class="form-group {{ $errors->has('account_no') ? 'has-error' : ''}}">
            <label for="account_no" class="">
                <span class="field_compulsory">*</span>@lang('people.label.account_no')
            </label>
            {!! Form::text('account_no', !empty($user->account_no) ? $user->account_no : '', ['class' => 'form-control']) !!} 
            {!! $errors->first('account_no','<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            <label for="first_name" class="">
                <span class="field_compulsory">*</span>@lang('people.label.first_name')
            </label>
            {!! Form::text('first_name', !empty($user->first_name) ? $user->first_name : '', ['class' => 'form-control']) !!} 
            {!! $errors->first('name','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
            <label for="last_name" class="">
                <span class="field_compulsory">*</span>@lang('people.label.last_name')
            </label>
            {!! Form::text('last_name', !empty($user->last_name) ? $user->last_name : '', ['class' => 'form-control']) !!} 
            {!! $errors->first('name','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
            <label for="roles" class="">
                <span class="field_compulsory">*</span>@lang('people.label.roles')
            </label>
            {!! Form::select('roles', $roles, !empty($user_roles) ? $user_roles : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'role' ]) !!}
            {!! $errors->first('roles','<p class="help-block">:message</p>') !!}
        </div>
         <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email" class="">
                <span class="field_compulsory">*</span>@lang('people.label.email')
            </label>
            {!! Form::email('email', !empty($user->email) ? $user->email : '', ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
            <label for="contact" class="col-md-12">
                @lang('people.label.contact')
            </label>
            {!! Form::text('contact', !empty($user->contact) ? $user->contact : '' , ['class' => 'form-control']) !!}
            {!! $errors->first('Phone', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
            <label for="address" class="col-md-12">
                @lang('people.label.address')
            </label>
            {!! Form::textarea('address',  !empty($user->address) ? $user->address : '', ['id' => 'address', 'rows' => 6, 'cols' => 54, 'style' => 'resize:none']) !!}
            {!! $errors->first('address','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('passport') ? 'has-error' : ''}}">
            <label for="passport" class="col-md-12">
                @lang('people.label.passport')
            </label>
            {!! Form::file('passport',null, ['class' => 'form-control']) !!} 
            @if(!empty($user) && !empty($user->passport))
                @if( file_exists(public_path('/user/'.$user->passport) )  )
                    <img  src="{{url('/user/'.$user->passport)}}" width="125" height="100" alt="{{ $user->passport }}"/>  
                @endif          
             @endif 
            {!! $errors->first('passport', '<p class="help-block with-errors">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('proof_of_residency') ? 'has-error' : ''}}">
            <label for="proof_of_residency" class="col-md-12">
                @lang('people.label.proof_of_residency')
            </label>
            {!! Form::file('proof_of_residency',null, ['class' => 'form-control']) !!} 
            @if(!empty($user) && !empty($user->proof_of_residency))
                @if( file_exists(public_path('/user/'.$user->proof_of_residency) )  )
                    <img  src="{{url('/user/'.$user->proof_of_residency)}}" width="125" height="100" alt="{{ $user->proof_of_residency }}"/>  
                @endif          
            @endif 
            {!! $errors->first('proof_of_residency', '<p class="help-block with-errors">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('tax_from') ? 'has-error' : ''}}">
            <label for="tax_from" class="col-md-12">
                @lang('people.label.tax_from')
            </label>
            {!! Form::text('tax_from', !empty($user->tax_from) ? $user->tax_from : '', ['class' => 'form-control']) !!} 
            {!! $errors->first('tax_from','<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('is_corporate') ? 'has-error' : ''}}">
            <label for="is_corporate" class="col-md-12">
                @lang('people.label.is_corporate')
            </label>
            {!! Form::checkbox('fed_ex', null, (!empty($user->is_corporate)) ? 'checked="checked"' : "", array('id'=>'fed_ex')) !!}
            {!! $errors->first('is_corporate', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('certificate_of_incorpo') ? 'has-error' : ''}}">
            <label for="certificate_of_incorpo" class="col-md-12">
                @lang('people.label.certificate_of_incorpo')
            </label>
            {!! Form::file('certificate_of_incorpo',null, ['class' => 'form-control']) !!} 
            @if(!empty($user) && !empty($user->certificate_of_incorpo))
                @if( file_exists(public_path('/user/'.$user->certificate_of_incorpo) )  )
                    <img  src="{{url('/user/'.$user->certificate_of_incorpo)}}" width="125" height="100" alt="{{ $user->certificate_of_incorpo }}"/>  
                @endif          
            @endif 
            {!! $errors->first('certificate_of_incorpo', '<p class="help-block with-errors">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('articals_memorandoms') ? 'has-error' : ''}}">
            <label for="articals_memorandoms" class="col-md-12">
                @lang('people.label.articals_memorandoms')
            </label>
            {!! Form::file('articals_memorandoms',null, ['class' => 'form-control']) !!}  
            @if(!empty($user) && !empty($user->articals_memorandoms))
                @if( file_exists(public_path('/user/'.$user->articals_memorandoms) )  )
                    <img  src="{{url('/user/'.$user->articals_memorandoms)}}" width="125" height="100" alt="{{ $user->articals_memorandoms }}"/>  
                @endif          
            @endif 
            {!! $errors->first('articals_memorandoms', '<p class="help-block with-errors">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('cert_of_incumbency') ? 'has-error' : ''}}">
            <label for="cert_of_incumbency" class="col-md-12">
                @lang('people.label.cert_of_incumbency')
            </label>
            {!! Form::file('cert_of_incumbency',null, ['class' => 'form-control']) !!} 
            @if(!empty($user) && !empty($user->cert_of_incumbency))
                @if( file_exists(public_path('/user/'.$user->cert_of_incumbency) )  )
                    <img  src="{{url('/user/'.$user->cert_of_incumbency)}}" width="125" height="100" alt="{{ $user->cert_of_incumbency }}"/>  
                @endif          
            @endif
            {!! $errors->first('cert_of_incumbency', '<p class="help-block with-errors">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('cert_of_good_standing') ? 'has-error' : ''}}">
            <label for="cert_of_good_standing" class="col-md-12">
                @lang('people.label.cert_of_good_standing')
            </label>
            {!! Form::file('cert_of_good_standing',null, ['class' => 'form-control']) !!} 
            @if(!empty($user) && !empty($user->cert_of_good_standing))
                @if( file_exists(public_path('/user/'.$user->cert_of_good_standing) )  )
                    <img  src="{{url('/user/'.$user->cert_of_good_standing)}}" width="125" height="100" alt="{{ $user->cert_of_good_standing }}"/>  
                @endif          
            @endif 
            {!! $errors->first('cert_of_good_standing', '<p class="help-block with-errors">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('client_classes') ? 'has-error' : ''}}">
            <label for="client_classes" class="">
                @lang('class.label.client_classes')
            </label>
           {!! Form::select('client_classes', $client_classes, !empty($client_classes) ? $client_classes : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'banked' ]) !!}
            {!! $errors->first('client_classes', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('beneficial_owner') ? 'has-error' : ''}}">
            <label for="beneficial_owner" class="">
                @lang('class.label.beneficial_owner')
            </label>
           {!! Form::select('beneficial_owner', $beneficial_owner, !empty($beneficial_owner) ? $beneficial_owner : '', ['class' => 'form-control select2', 'multiple' =>false ,'id'=> 'banked' ]) !!}
            {!! $errors->first('beneficial_owner', '<p class="help-block">:message</p>') !!}
        </div>
		<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
            {!! Form::label('status', trans('common.label.status'), ['class' => '']) !!}
            {!! Form::select('status',trans('common.active_status'), null, ['class' => 'form-control']) !!}
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
     $( document ).ready(function() {
            $("option[value='SU']").remove();
            $("#beneficial_owner option[value='1']").remove();
            var roles = $('#role').val();
            
            if(roles != '' || roles != null) {
                if(roles == "Installers"){
                    $(".installer_fields").show()  
                }else{
                    $(".installer_fields").hide()
                }
            }   
        });
        $("input[name='is_corporate']")
        $('#role').on('change',function(){
            var roles = $(this).val();
      
            if( roles != null){
                    if(roles == "Installers"){
                        $(".installer_fields").show()
                    }else{
                        $(".installer_fields").hide()
                    } 
            }else{
                $(".installer_fields").hide()
            }
   
       });
</script>


@endpush

