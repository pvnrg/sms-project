@extends('layouts.apex')

@section('title',trans('class.label.creater_transaction'))

@section('content')

    <section id="basic-form-layouts">
	<div class="row">
            <div class="col-sm-12">
                <div class="content-header"> @lang('class.label.create_new_transaction') </div>
            </div>
        </div>
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
                        <a href="{{ url('/admin/transactions') }}" title="Back">
                            <button class="btn btn-raised btn-success round btn-min-width mr-1 mb-1"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('common.label.back')
                            </button>
                        </a>
	                <div class="actions pull-right">
                          
                        </div>
                        
	            </div>
	            <div class="card-body">
	                <div class="px-3">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
	                     {!! Form::open(['url' => '/admin/transactions', 'class' => 'form-horizontal','files' => true,'autocomplete'=>'off']) !!}

                                @include ('admin.transactions.form')

                                {!! Form::close() !!}
                            
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	

	

	
</section>
   
@endsection
