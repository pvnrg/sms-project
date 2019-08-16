@extends('layouts.apex')
@section('title',trans('class.label.edit_client_class'))

@section('content')


    <section id="basic-form-layouts">
    <div class="row">
            <div class="col-sm-12">
                <div class="content-header"> @lang('class.label.edit_client_class') # {{$client_classes->name}} </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/client_classes') }}" title="Back">
                        <button class="btn btn-raised btn-success round btn-min-width mr-1 mb-1"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('common.label.back')
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="px-3">

                            {!! Form::model($client_classes, [
                                'method' => 'PATCH',
                                'url' => ['/admin/client_classes', $client_classes->id],
                                'class' => 'form-horizontal',
                                'files' => true,
                                'autocomplete'=>'off'
                            ]) !!}

                            @include ('admin.client_classes.form', ['submitButtonText' => trans('common.label.update')])

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection