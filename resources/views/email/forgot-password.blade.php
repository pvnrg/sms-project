@extends('email.mailtemplate.cit')

@section('body')
    @if(isset($user))
        <h2 class="title">Hi {{$user->full_name}}</h2>
    @endif

    <p>
        
        @lang('email.slug.you_have_request_to_forgot_password',['app'=>\config('admin.APP_NAME')],'he')
		<br/><br/>
		
		@lang('email.slug.your_otp_to_reset_password_is',[],'he') : <b> {{$user->otp_token}} </b>
		
        <br/>
		<br/>
		
        
		@lang('email.slug.if_you_did_not_request',[],'he')
		
		<br/>
    </p>
    
    <hr>
    
@endsection