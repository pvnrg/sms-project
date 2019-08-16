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

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="title" class="">
                <span class="field_compulsory">*</span>@lang('class.label.name')
            </label>
                {!! Form::text('name', isset($transaction_types->name) ? $transaction_types->name : '', ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
            <label for="description" class="">
                <span class="field_compulsory">*</span>@lang('class.label.description')
            </label>
                {!! Form::textarea('description', isset($transaction_types->description) ? $transaction_types->description : '', ['class' => 'form-control']) !!}
                {!! $errors->first('description', '<p class="help-block">:message</p>') !!}

        </div>
        <!-- <div class="form-group {{ $errors->has('link_of_youtube') ? 'has-error' : ''}}">
            <label for="link_of_youtube" class="">
                <span class="field_compulsory">*</span>@lang('class.label.link_of_youtube')
            </label>
                {!! Form::text('link_of_youtube', null, ['class' => 'form-control']) !!}
                {!! $errors->first('link_of_youtube', '<p class="help-block">:message</p>') !!}

        </div>
        <div class="form-group {{ $errors->has('profile_image') ? 'has-error' : ''}}">
            <label for="profile_image" class="">
                <span class="field_compulsory">*</span>@lang('class.label.profile_image')
            </label>
                {!! Form::file('profile_image', ['accept'=>"image/*",'class' => 'form-control','multiple'=>false]) !!}
                {!! $errors->first('profile_image', '<p class="help-block">:message</p>') !!}

        </div>

        @if(isset($class))
            @if($refefile->file_thumb_url != "" )
                        <img src="{!! $refefile->file_thumb_url !!}" height="80" />
                        @else
                        <img src="{!! $refefile->file_url !!}" height="80" />
            @endif
        @endif -->
<!-- 
		<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
            {!! Form::label('status', trans('common.label.status'), ['class' => '']) !!}
            {!! Form::select('status',trans('common.active_status'), null, ['class' => 'form-control']) !!}
        </div> -->
        

        
      
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


@endpush

