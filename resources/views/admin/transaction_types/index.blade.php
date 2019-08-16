@extends('layouts.apex')

@section('body_class',' pace-done')

@section('title',trans('class.label.transaction_type'))

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="content-header"> @lang('class.label.transaction_type') </div>
        {{--  @include('partials.page_tooltip',['model' => 'class','page'=>'index']) --}}
    </div>
</div>

    <section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                    <div class="row">
                    
                    <div class="col-3">
                        <div class="actions pull-left">
                            
                                <a href="{{ url('/admin/transaction_types/create') }}" class="btn btn-success btn-sm"
                                   title="Add New User">
                                    <i class="fa fa-plus" aria-hidden="true"></i> @lang('common.label.add_new')
                                </a>

                            
                          </div>
                         </div>
                        <div class="col-9">
                          
                            
                    </div>
                    </div>
                </div>
                <div class="card-body collapse show">
                    
                    <div class="card-block card-dashboard">
                       
                        
                        <div class="table-responsive">
                           <table class="table table-bordered table-striped datatable responsive">
                            <thead>
                            <tr>
                                <th>@lang('class.label.id')</th>
                                <th>@lang('class.label.name')</th>
								<th>@lang('common.label.action')</th>
                            </tr>
                            </thead>

                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


@endsection



@push('js')
<script>

	var active_status = <?php echo json_encode(trans('common.active_status')); ?>;
	
    var url = "{{url('admin/transaction_types')}}";
	var auth_uid = {{\Auth::user()->id}};
    datatable = $('.datatable').dataTable({
        pagingType: "full_numbers",
        "language": {
            "emptyTable":"@lang('common.datatable.emptyTable')",
            "infoEmpty":"@lang('common.datatable.infoEmpty')",
            "search": "@lang('common.datatable.search')",
            "sLengthMenu": "@lang('common.datatable.show') _MENU_ @lang('common.datatable.entries')",
            "sInfo": "@lang('common.datatable.showing') _START_ @lang('common.datatable.to') _END_ @lang('common.datatable.of') _TOTAL_ @lang('common.datatable.small_entries')",
            paginate: {
                next: '@lang('common.datatable.paginate.next')',
                previous: '@lang('common.datatable.paginate.previous')',
                first:'@lang('common.datatable.paginate.first')',
                last:'@lang('common.datatable.paginate.last')',
            }
        },
        processing: true,
        serverSide: true,
        autoWidth: false,
        stateSave: false,
        order: [1, "asc"],
        columns: [
            { "data": "id","name":"id","searchable": false,"width":"8%"},
            { "data": "name","name":"name","searchable": false,"width":"18%"},
            
            { "data": null,
                "searchable": false,
                "orderable": false,
                "width": "4%",
                "render": function (o) {
                    var e=""; var d=""; var v="";

                        e= " <a href='"+url+"/"+o.id+"/edit' class='btn btn-warning btn-sm' data-id="+o.id+" title='@lang('tooltip.common.icon.edit')'><i class='fa fa-edit action_icon'></i></a>";
                   
                        d = " <a href='javascript:void(0);' class='del-item btn btn-danger btn-sm' data-id="+o.id+" title='@lang('tooltip.common.icon.delete')' ><i class='fa fa-trash action_icon '></i></a>";
                   
				  

                    var v =  " <a href='"+url+"/"+o.id+"' class='btn btn-info btn-sm' data-id="+o.id+" title='@lang('tooltip.common.icon.eye')'><i class='fa fa-eye' aria-hidden='true'></i></a>";


                    return v+d+e;

                }
            }

        ],
        fnRowCallback: function (nRow, aData, iDisplayIndex) {
            $('td', nRow).attr('nowrap', 'nowrap');
            return nRow;
        },
        ajax: {
            url: "{{ url('admin/transaction_types/datatable') }}", // json datasource
            type: "get", // method , by default get
            data: function (d) {
                
            }
        }
    });

    $('.filter').change(function() {
        datatable.fnDraw();
    });

    $(document).on('click', '.del-item', function (e) {
        var id = $(this).attr('data-id');
        var r = confirm("@lang('common.js_msg.confirm_for_delete_data')");
        if (r == true) {
            $.ajax({
                type: "DELETE",
                url: url + "/" + id,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                success: function (data) {
                    datatable.fnDraw();
                    toastr.success("@lang('common.js_msg.action_success')", data.message)
                },
                error: function (xhr, status, error) {
                    var erro = ajaxError(xhr, status, error);
                    toastr.error("@lang('common.js_msg.action_not_procede')",erro)
                }
            });
        }
    });


</script>


@endpush