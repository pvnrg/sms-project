@extends('layouts.apex')
@section('title',trans('class.label.edit_fees_schecule'))

@section('content')


    <section id="basic-form-layouts">
    <div class="row">
            <div class="col-sm-12">
                <div class="content-header"> @lang('class.label.edit_fee_schedules') # {{$fee_schedules->name}} </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/fee_schedules') }}" title="Back">
                        <button class="btn btn-raised btn-success round btn-min-width mr-1 mb-1"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('common.label.back')
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="px-3">

                            {!! Form::model($fee_schedules, [
                                'method' => 'PATCH',
                                'url' => ['/admin/fee_schedules', $fee_schedules->id],
                                'class' => 'form-horizontal',
                                'files' => true,
                                'autocomplete'=>'off'
                            ]) !!}

                            @include ('admin.fee_schedules.form', ['submitButtonText' => trans('common.label.update')])

                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection