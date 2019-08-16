@extends('layouts.frontend')

@section('body_class',' pace-done')

@section('title','Tasks')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="content-header"> Assigned Tasks </div>
        {{--  @include('partials.page_tooltip',['model' => 'user','page'=>'index']) --}}
    </div>
</div>

    <section id="configuration">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   
                    <div class="row">
                    
                    <div class="col-3">
                       
                          
                            
                    </div>
                    </div>
                </div>
                <div class="card-body collapse show">
                    
                    <div class="card-block card-dashboard">
                       
                        
                        <div class="table-responsive">
                           <table class="table table-bordered table-striped datatable responsive">
                            <thead>
                            <tr>
                                <th data-priority="1">#ID</th>
                                <th data-priority="2">Subject</th>
                                <th data-priority="3">Status</th>
                                <th data-priority="6">Description</th>
								<th data-priority="5">Date</th>
								<th data-priority="4">@lang('common.label.action')</th>
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

    var url = "{{url('tasks')}}";
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
            { "data": "id","name":"id","width":"8%"},
            { "data": "subject","name":"subject","width":"15%"},
            { "data": "status","name":"status","width":"10%"},
            { "data": "content","name":"content","width":"25%"},
            { "data": "created","name":"created","width":"20%"},
            { "data": null,
                "searchable": false,
                "orderable": false,
                "width": "4%",
                "render": function (o) {
                    var e=""; var d=""; var v="";

                    var v =  " <a href='#' data-id="+o.id+" class='action_complete' title='Complete'><i class='fa fa-check-circle' aria-hidden='true'></i></a>";


                    return v+d+e;

                }
            }

        ],
        fnRowCallback: function (nRow, aData, iDisplayIndex) {
            $('td', nRow).attr('nowrap', 'nowrap');
            return nRow;
        },
        ajax: {
            url: "{{ url('tasks/datatable') }}", // json datasource
            type: "get", // method , by default get
            data: function (d) {
                
            }
        }
    });

	
	$(document).on('click', '.action_complete', function (e) {
		var id=$(this).attr('data-id');
		var r = confirm("Are you sure to complete and submit the task");
        if (r == true) {
			
		var formData = {
            'task_id': id,
            'status': "solved",
        };
		$.ajax({
            type: "POST",
            url: url + "/changestatus",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function (data) {
				datatable.fnDraw(false);
                toastr.success('Action Success!', data.message)
            },
            error: function (xhr, status, error) {
                var erro = ajaxError(xhr, status, error);
                toastr.error('Action Not Procede!',erro)
            }
        });
		}

        return false;

    });
    

</script>


@endpush