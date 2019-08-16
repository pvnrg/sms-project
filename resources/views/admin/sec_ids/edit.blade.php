@extends('layouts.apex')
@section('title',trans('class.label.edit_sec_ids'))

@section('content')


    <section id="basic-form-layouts">
    <div class="row">
            <div class="col-sm-12">
                <div class="content-header"> @lang('class.label.edit_sec_ids') # {{$sec_ids->name}} </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/sec_ids') }}" title="Back">
                        <button class="btn btn-raised btn-success round btn-min-width mr-1 mb-1"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('common.label.back')
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="px-3">

                            {!! Form::model($sec_ids, [
                                'method' => 'PATCH',
                                'url' => ['/admin/sec_ids', $sec_ids->id],
                                'class' => 'form-horizontal',
                                'files' => true,
                                'autocomplete'=>'off'
                            ]) !!}

                            @include ('admin.sec_ids.form', ['submitButtonText' => trans('common.label.update')])

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection