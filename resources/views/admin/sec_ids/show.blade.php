@extends('layouts.apex')

@section('title',trans('class.label.show_transaction_type'))

@section('content')

    <section id="basic-form-layouts">
    <div class="row">
            <div class="col-sm-12">
                <div class="content-header"> @lang('class.label.show_sec_id')</div>
               
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
                     <div class="next_previous pull-right">
                   
                      </div>  
                          
                        
                        
                </div>
                <div class="card-body">
                    <div class="px-3">
                           <div class="box-content ">
                               <div class="row">
                                   <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>

                                            <tr>
                                                <td>@lang('common.label.id')</td>
                                                <td>{{ $sec_ids->id }}</td>
                                            </tr>
                                            <tr>

                                                <td>@lang('class.label.name')</td>
                                                <td> {{ $sec_ids->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>@lang('class.label.description')</td>
                                                <td> {{ $sec_ids->description }} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection


     